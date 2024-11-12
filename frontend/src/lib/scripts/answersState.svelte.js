import { Answer } from "$lib/components/questions/scripts/Answer.svelte.js";
function getAnswersState(){
    /**
     * @type {Array<{question_id: number, content: ?string, topic_id: number}>}
    */
   const answers = [];
   const activeAnswer = new Answer({});
    
    return {
        // @ts-ignore
        activeAnswer,
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
     */
    function pushTo(){
        answers.push(
            // deep cloning
            JSON.parse(
                JSON.stringify(this.activeAnswer.getData())
            ));
    }

    function popFrom(){
        return answers.pop();
    }
}

export const answerState = getAnswersState();