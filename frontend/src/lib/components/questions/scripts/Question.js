export class Question{
    /**
     * @type {number}
     */
    id;

    /**
     * @type {string}
     */
    content;

    /**
     * @type {number}
     */
    topicId;

    /**
     * @type {number}
     */
    nextTopicId;

    /**
     * 
     * @param {{id: number, content: string, topic_id: number, next_topic_id: number}} value 
     */
    constructor({id, content, topic_id, next_topic_id}){
        this.id = id;
        this.content = content;
        this.topicId = topic_id;
        this.nextTopicId = next_topic_id;

        return Object.seal(this);
    }
}