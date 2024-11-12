import { Answer } from './components/questions/scripts/Answer.svelte.js';

/**
 * @typedef Topicmap
 * @property {number} key - Topic id
 * @property {string} value - The instance of the topic class
 */
export const Topicmap = 'Topicmap';


/**
 * @typedef AnswersState
 * @property {Answer} activeAnswer
 * @method setActiveAnswer
 * @method pushTo
 * @method popFrom
 */
export const AnswersState = 'AnswersState';