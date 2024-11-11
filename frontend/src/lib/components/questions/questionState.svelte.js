import { Topic } from './scripts/Topic.svelte.js';
import {API_ORIGIN, API_ROUTE, ALL_TOPICS_ROUTE, API_INSIDE_ORIGIN} from '$lib/const';
import { requestToJson } from '$lib/scripts/requests';
import { browser } from '$app/environment';
import { getAnswersState } from '$lib/scripts/answersState.svelte.js';

/**
 * @type {Topic}
 */
export const activeTopic = new Topic({});
export const activateButton = $state({active: false});

/**
 * @type {?import('$lib/types').Topicmap}
 */
let topics = null;

const answersState = getAnswersState();

/**
 * 
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
        setActiveTopic(new Topic(topic));
        break;
    }
}

export function nextQuestion(){
    // activeAnswer pushTo
    // calculate nextquestion according to nextQuestionId
    // setActiveTopic
}