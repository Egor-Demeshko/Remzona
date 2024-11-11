<script>
	import { Question } from '$lib/components/questions/scripts/Question';
	import { FREE_INPUT } from '$lib/const';
	import { onQuestionPicked } from '$lib/components/questions/questionState.svelte.js';
	import Input from '../Input.svelte';

	/**
	 * @type {{question:Question}}
	 */
	// @ts-ignore
	const { question } = $$props;
	const { id, content, topicId, nextTopicId } = question || {};
</script>

<li>
	{#if content === FREE_INPUT}
		<Input {id} free={true} {topicId} />
	{:else}
		<Input {id} />
	{/if}
</li>
