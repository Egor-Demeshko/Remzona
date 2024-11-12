<script>
	import { BUTTON_BACKWORD, BUTTON_FORWARD, BUTTON_FINISH } from '$lib/const';
	import BuiltInButton from '../BuiltInButton.svelte';
	import {
		activeTopic,
		nextQuestion,
		previousQuestion,
		getStackSize
	} from '$lib/components/questions/questionState.svelte.js';
	import { answerState } from '$lib/scripts/answersState.svelte';

	let backwordDisabled = $derived(activeTopic.topic_id && getStackSize() === 0 ? true : false);

	let forwardDisabled = $derived(
		activeTopic.topic_id && answerState.activeAnswer.nextTopicId ? false : true
	);

	let finish = $derived(
		answerState.activeAnswer.questionId === 0 ||
			(answerState.activeAnswer.questionId && answerState.activeAnswer.nextTopicId)
			? false
			: true
	);

	/**
	 * @param {string} value
	 */
	function callbackOnClick(value) {
		if (value === BUTTON_BACKWORD) {
			previousQuestion();
		} else if (value === BUTTON_FORWARD) {
			nextQuestion();
		}
	}
</script>

<div class="buttons_row">
	{#if finish}
		<BuiltInButton
			type={BUTTON_FINISH}
			disabled={false}
			callbackOnClick={() => answerState.saveAnswers()}
		/>
	{:else}
		<div class="flex-1">
			<BuiltInButton type={BUTTON_BACKWORD} {callbackOnClick} disabled={backwordDisabled} />
		</div>
		<div class="flex-1">
			<BuiltInButton type={BUTTON_FORWARD} {callbackOnClick} disabled={forwardDisabled} />
		</div>
	{/if}
</div>

<style>
	.buttons_row {
		display: flex;
		align-items: center;
		border-radius: 16px;
		border: 3px solid var(--choice-color-hover);
		background-color: white;
		overflow: hidden;
		box-shadow: 0px 0px 18px var(--choice-background-hover);
	}

	.flex-1 {
		flex: 1;
	}
</style>
