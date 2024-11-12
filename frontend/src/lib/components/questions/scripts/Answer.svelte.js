/**
 * Answer is used collected answers
 * and as object to controll current active answer
 */
export class Answer {
    /**
     * @type {number}
     */
    questionId = $state(0);

    /**
     * @type {?string}
     */
    content;

    /**
     * @type {number}
     */
    topicId;

    /**
     * @type {?number}
     */
    nextTopicId = $state(0);

    /** 
     * 
     * @param {{question_id: number, answer: ?string, topic_id: number, next_topic_id: ?number}} value
    */
    constructor({question_id = 0, answer = null, topic_id = 0, next_topic_id = null}){
        this.questionId = question_id;
        this.content = answer;
        this.topicId = topic_id;
        this.nextTopicId = next_topic_id;
        return Object.seal(this);
    }

    /**
     * 
     * @param {Answer} answer 
     */
    setData(answer){
        this.questionId = answer.questionId;
        this.content = answer.content;
        this.topicId = answer.topicId;
        this.nextTopicId = answer.nextTopicId;
    }

    getData(){
        return {
            question_id: this.questionId,
            content: this.content,
            topic_id: this.topicId,
            next_topic_id: this.nextTopicId
        }
    }
}