<script>
	import { BUTTON_BACKWORD, BUTTON_FORWARD } from '$lib/const';
	import BuiltInButton from '../BuiltInButton.svelte';
	import {
		nextQuestion,
		previousQuestion
	} from '$lib/components/questions/questionState.svelte.js';

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
	<div class="flex-1">
		<BuiltInButton type={BUTTON_BACKWORD} {callbackOnClick} />
	</div>
	<div class="flex-1">
		<BuiltInButton type={BUTTON_FORWARD} {callbackOnClick} />
	</div>
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
