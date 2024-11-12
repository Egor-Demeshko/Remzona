<script>
	import { Question } from '$lib/components/questions/scripts/Question';
	import { FREE_INPUT } from '$lib/const';
	import Radio from '$lib/components/Radio.svelte';
	import { answerState } from '$lib/scripts/answersState.svelte.js';
	import { Answer } from './scripts/Answer.svelte.js';

	/**
	 * @type {{question:Question}}
	 */
	// @ts-ignore
	const { question } = $props();

	const { id, content, topicId, nextTopicId } = question || {};

	let answer = $state('');

	/**
	 * @type {number|null}
	 */
	let nextTopic = $state(null);

	/**
	 * @param {{id:number, topicId:number, nextTopicId:number}} value
	 */
	function onUpdate({ id, topicId, nextTopicId }) {
		nextTopic = nextTopicId;

		launchUpdate({ id, topicId, nextTopicId });
	}

	function setUpdate() {
		onUpdate({ id, topicId, nextTopicId });
	}

	/**
	 * @param {{id:number, topicId:number, nextTopicId:number}} value
	 */
	function launchUpdate({ id, topicId, nextTopicId }) {
		answerState.setActiveAnswer(
			new Answer({
				question_id: id,
				answer: content === FREE_INPUT ? answer : content,
				topic_id: topicId,
				next_topic_id: nextTopicId
			})
		);
	}
</script>

<li>
	<Radio {id} {topicId} {nextTopicId} {onUpdate} />

	{#if content === FREE_INPUT}
		<input bind:value={answer} type="text" onfocus={setUpdate} onchange={setUpdate} />
	{:else}
		<p>{content}</p>
	{/if}
</li>

<style>
	li {
		display: flex;
		align-items: center;
		gap: 1rem;
		list-style: none;
		margin: 0;
		padding: 0;
		font-family: Ubuntu, sans-serif;
		font-weight: 600;
	}

	p {
		margin: 0;
	}

	input {
		padding: calc(var(--padding-base) / 2) 1rem;
		border-radius: 6px;
		border: 2px solid var(--choice-background-hover);
		background-color: var(--choice-background);
		outline: none;
		transition:
			border 0.4s ease,
			background 0.4s ease;
	}

	input:hover,
	input:focus {
		background-color: var(--choice-background-hover);
		border: 2px solid var(--choice-color-hover);
	}
</style>
