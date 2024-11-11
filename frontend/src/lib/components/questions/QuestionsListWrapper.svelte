<script>
	import { activeTopic } from '$lib/components/questions/questionState.svelte.js';
	import QuestionsList from './QuestionsList.svelte';
</script>

<div class="question-list">
	<div class="question-wrapper">
		<h2>{activeTopic.heading}</h2>

		<QuestionsList />
	</div>
</div>

<style>
	.question-list {
		padding: var(--padding-base);
	}

	.question-wrapper {
		padding: var(--padding-base) 0;
	}

	h2 {
		padding: var(--padding-base);
		border-radius: 4px;
		background-color: black;
		color: white;
		margin: 0;
		font-size: 1.5rem;
		font-family: Ubuntu, sans-serif;
	}
</style>
