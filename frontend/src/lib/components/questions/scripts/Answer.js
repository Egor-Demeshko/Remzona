export class Answer {
    /** 
     * 
     * @param {number} question_id 
     * @param {string} answer
    */
    constructor(question_id, answer) {
        this.question_id = question_id;
        this.answer = answer;

        return Object.seal(this);
    }
}