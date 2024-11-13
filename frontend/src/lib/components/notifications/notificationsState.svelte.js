import { NOTIFICATION_OK } from '$lib/const';

class NotificationsState {
    /**
     * @type {Array<import('$lib/types').Notification>}
     */
    notificationsQueue = $state([]);

    /**
     * @type {number} - Time in miliseconds
     */
    notificationTime = 9000;

    constructor(){
        setInterval(() => this.checkQueue(), 1000);
    }

    /**
     * 
     * @param {string} message 
     */
    addNotification(message, type = NOTIFICATION_OK)
    {
        this.notificationsQueue.unshift({
            message: message,
            type,
            timestamp: Date.now()
        });
    }

    checkQueue(){
        let now = Date.now();
        let length = this.notificationsQueue.length;

        if( this.notificationsQueue.length > 0 
            && (now - this.notificationTime > this.notificationsQueue[ length - 1].timestamp)){
                this.notificationsQueue.pop();
            }
    }
}

export const notificationsState = new NotificationsState();