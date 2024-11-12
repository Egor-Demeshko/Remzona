import { Topic } from './scripts/Topic.svelte.js';
import {API_ORIGIN, API_ROUTE, ALL_TOPICS_ROUTE, API_INSIDE_ORIGIN} from '$lib/const';
import { requestToJson } from '$lib/scripts/requests';
import { browser } from '$app/environment';
import { answerState } from '$lib/scripts/answersState.svelte.js';

/**
 * @type {Topic}
 */
export const activeTopic = new Topic({});
export const activateButton = $state({active: false});

/**
 * @type {?import('$lib/types').Topicmap}
 */
let topics = null;

const answersState = answerState;

/**
 * @param {Topic} topic 
 */
export function setActiveTopic(topic) {
    activeTopic.setData(topic);
}

/**
 * @description - Initial topics load from server
 */
export async function getTopics(){
    const origin = browser ? API_ORIGIN : API_INSIDE_ORIGIN;

    const newTopics = await requestToJson(`${origin}${API_ROUTE}${ALL_TOPICS_ROUTE}`);
    topics = newTopics ? newTopics : {};

    return topics;
}

/**
 * 
 * @param {{}} topics 
 */
export function setActiveTopicFrom(topics)
{
    // @ts-ignore
    for(const topic of Object.values(topics)){
        // @ts-ignore
        setActiveTopic(topic);
        break;
    }
}

export function nextQuestion(){
    const activeAnswer = answersState.activeAnswer;

    if(!activeAnswer.questionId){
        return;
    }
    
    answersState.pushTo();
    for (const question of activeTopic.questions) {
        if(question.id === activeAnswer.questionId){
            if(question.nextTopicId && topics[question.nextTopicId]){
                activeTopic.setData(topics[question.nextTopicId]);
            } else {
                console.error("[QUESTION STACK ERROR]: Couldn't push answer to stack");
            }
            break;
        }
    }
}

export function previousQuestion(){
    const previousAnswer = answersState.popFrom();

    if(!topics){
        console.error("[QUESTION STACK ERROR]: Couldn't retrieve answer from stack. Topics wasn't loaded");
    }

    if(previousAnswer && previousAnswer.topic_id){
        const topicId = previousAnswer.topic_id;
        // @ts-ignore
        if(topics[topicId]){
            // @ts-ignore
            setActiveTopic(topics[topicId]);
        }
    }
}