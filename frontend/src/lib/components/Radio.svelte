<script>
	import { answerState } from '$lib/scripts/answersState.svelte.js';
	import { scale } from 'svelte/transition';

	/**
	 * @type {{id:number, topicId:number, nextTopicId:number, onUpdate:Function}}
	 */
	let { id, topicId, nextTopicId, onUpdate } = $props();
	let inputChecked = $derived(answerState.activeAnswer.questionId === id);

	/**
	 * @type {HTMLElement}
	 */
	let wrapper;

	/**
	 * @param {Event} e
	 */
	function clicked(e) {
		// @ts-ignore
		if (e.target.closest('.wrapper') !== wrapper) return;

		if (answerState.activeAnswer.questionId !== id) {
			onUpdate({ id, topicId, nextTopicId });
		} else {
			onUpdate({ id: 0, topicId: 0, nextTopicId: null });
		}
	}

	/**
	 * @param {KeyboardEvent} event
	 */
	function keyPressed(event) {
		const target = event.target;
		// @ts-ignore
		if (event.key === 'Enter' && target.closest('.wrapper') === wrapper) {
			clicked(event);
		}
	}
</script>

<div
	class="wrapper"
	onkeypress={keyPressed}
	onclick={clicked}
	role="radio"
	aria-checked={inputChecked}
	tabindex="0"
	bind:this={wrapper}
>
	<input type="radio" checked={inputChecked} tabindex="-1" name="question-option" />
	{#if inputChecked}
		<div class="checkmark" transition:scale={{ duration: 200 }}></div>
	{/if}
</div>

<style>
	.wrapper {
		position: relative;
		border-radius: 50%;
		border: 2px solid var(--choice-color);
		background-color: var(--choice-background);
		width: 1.25rem;
		height: 1.25rem;
		cursor: pointer;
		transition:
			background 0.4s ease,
			border 0.4s ease;
	}

	.wrapper:hover {
		background-color: var(--choice-background-hover);
		border: 2px solid var(--choice-color-hover);
	}

	input {
		position: absolute;
		top: 0px;
		left: 0px;
		width: 0px;
		height: 0px;
		opacity: 0;
		pointer-events: none;
	}

	.checkmark {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 0.625rem;
		height: 0.625rem;
		background-color: var(--choice-color);
		border-radius: 50%;
		transition: background 0.4s ease;
	}

	.wrapper:hover .checkmark {
		background-color: var(--choice-color-hover);
	}
</style>
