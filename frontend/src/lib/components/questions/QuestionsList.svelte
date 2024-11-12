<script>
	import SingleQuestion from './SingleQuestion.svelte';
	import { activeTopic } from '$lib/components/questions/questionState.svelte.js';
</script>

<form>
	<ul>
		{#key activeTopic.questions}
			{#each activeTopic.questions as question}
				<SingleQuestion {question} />
			{/each}
		{/key}
	</ul>
</form>

<style>
	ul {
		list-style: none;
		margin: 0;
		padding: calc(2 * var(--padding-base));
		display: flex;
		flex-direction: column;
		gap: 1.5rem;
	}
</style>
