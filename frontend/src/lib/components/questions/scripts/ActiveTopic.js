import { Question } from "$lib/types";

/**
 * 
 * @param {number} topic_id 
 * @param {?string} heading 
 * @param {Array<Question>} questions 
 */
export class ActiveTopic{
    constructor(topic_id = 0, heading = null, questions = null){
        this.id = topic_id;
        this.heading = heading;
        this.questions = questions;
        
        return Object.seal(this);
    }
}