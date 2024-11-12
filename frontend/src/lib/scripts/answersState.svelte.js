import { Answer } from "$lib/components/questions/scripts/Answer.svelte.js";
import { API_ORIGIN, API_ROUTE, SAVE_ANSWERS } from "$lib/const";
import {send} from "$lib/scripts/requests";

function getAnswersState(){
    /**
     * @type {Array<{question_id: number, content: ?string, topic_id: number, next_topic_id: ?number}>}
    */
   const answers = [];
   const activeAnswer = new Answer({});
    
    return {
        // @ts-ignore
        activeAnswer,
        setActiveAnswer,
        pushTo,
        popFrom,
        getStackSize,
        saveAnswers
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

    function getStackSize(){
        return answers.length;
    }

    function saveAnswers(){
        this.pushTo();
        send(
            API_ORIGIN + API_ROUTE + SAVE_ANSWERS,
            'POST',
            JSON.stringify(answers)
        );
    }
}

export const answerState = getAnswersState();