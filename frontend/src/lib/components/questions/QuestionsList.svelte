<script>
	import { activeTopic } from '$lib/components/questions/questionState.svelte.js';

	let { heading, questions } = activeTopic;
</script>

<div class="question-list"></div>

<style>
	.question-list {
		padding: 0.5rem;
	}
</style>
