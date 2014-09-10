function PusherActivityStreamer(activityChannel, ulSelector, options) {
    var self = this;

    this._email = null;

    options = options || {};
    this.settings = $.extend({
        maxItems: 10
    }, options);

    this._activityChannel = activityChannel;
    this._activityList = $(ulSelector);

    this._activityChannel.bind('activity', function(activity) {
        self._handleActivity.call(self, activity, activity.type);
    });

    this._itemCount = 0;
};

PusherActivityStreamer.prototype._handleActivity = function(activity, eventType) {
    var self = this;
    ++this._itemCount;

    var activityItem = PusherActivityStreamer._buildListItem(activity);
    activityItem.addClass(eventType);
    activityItem.hide();
    this._activityList.prepend(activityItem);
    activityItem.slideDown('slow');

    if(this._itemCount > this.settings.maxItems) {
        this._activityList.find('li:last-child').fadeOut(function(){
            $(this).remove();
            --self._itemCount;
        });
    }
};

PusherActivityStreamer._timeToDescription = function(time) {
    if(time instanceof Date === false) {
        time = Date.parse(time);
    }
    var desc = "dunno";
    var now = new Date();
    var howLongAgo = (now - time);
    var seconds = Math.round(howLongAgo/1000);
    var minutes = seconds/60;
    var hours = minutes/60;
    if(seconds === 0) {
        desc = "just now";
    }
    else if(minutes < 1) {
        desc = seconds + " seconds ago";
    }
    else if(minutes < 60) {
        desc = minutes + " minutes ago";
    }
    else if(hours < 24) {
        desc = hours + "hours ago";
    }
    else {
        desc = time.getDay() + " " + ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"][time.getMonth()]
    }
    return desc;
};

PusherActivityStreamer.prototype.sendActivity = function(activityType, activityData) {
    var data = {
        activity_type: activityType,
        activity_data: activityData
    };
    if(this._email) {
        data.email = this._email;
    }
    $.ajax({
        url: 'php/trigger_activity.php', // PHP
        // url: '/trigger_activity', // Node.js
        data: data
    })
};

PusherActivityStreamer.prototype.setEmail = function(value) {
    this._email = value;
};

PusherActivityStreamer._buildListItem = function(activity) {

    var li = $('<li class="activity"></li>');
    var container = $('<div class="alert alert-info"></div>');

    li.append(container);
    container.append(activity.msg);

    return container;
};