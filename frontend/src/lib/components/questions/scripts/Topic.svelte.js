import { Question } from "./Question";


export class Topic{
    topic_id = $state(0);
    /** @type {?string} */
    heading = $state(null);
    /** @type {Array<Question>} */
    questions = $state([]);

    /**
     * @param {{topic_id?: number, heading?: ?string, questions?: Array<Question>}} value
     */
    constructor({topic_id = 0, heading = null, questions = []}){
        this.topic_id = topic_id;
        this.heading = heading;

        // @ts-ignore
        questions = questions.map((singleQuestion) => {
            // @ts-ignore
            return new Question({...singleQuestion});
        });

        this.questions = questions;
        
        return Object.seal(this);
    }

    /**
     * 
     * @param {Topic} topic
     */
    setData({topic_id, heading, questions}){
        this.topic_id = topic_id;
        this.heading = heading;
        this.questions = questions;
    }
}