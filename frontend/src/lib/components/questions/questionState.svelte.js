import { ActiveTopic } from './scripts/ActiveTopic';
import {Answer} from './scripts/Answer';

/**
 * @type {ActiveTopic}
 */
export let activeTopic = $state(new ActiveTopic());
export let activateButton = $state(false);
/**
 * @type {Array<Answer>}
 */
const answers = [];

/**
 * 
 * @param {ActiveTopic} topic 
 */
export function setActiveTopic(topic) {
    activeTopic = topic;
}

/**
 * 
 * @param {boolean} activate 
 */
export function setActivateButton(activate) {
    activateButton = activate;
}