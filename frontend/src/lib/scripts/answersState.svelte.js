import { Answer } from "$lib/components/questions/scripts/Answer";

export function getAnswersState(){
    /**
     * @type {Array<Answer>}
     */
    const answers = [];
    
    return {
        // @ts-ignore
        activeAnswer: $state(new Answer({})),
        setActiveAnswer,
        pushTo,
        popFrom
    }

    /**
     * @this {import('$lib/types').AnswersState}
     * @param {Answer} answer 
     */
    function setActiveAnswer(answer){
        this.activeAnswer.setData(answer);
    }

    /**
     * @this {import('$lib/types').AnswersState}
     * @param {Answer} answer 
     */
    function pushTo(answer){
        answers.push(answer);
    }

    function popFrom(){
        return answers.pop();
    }
}