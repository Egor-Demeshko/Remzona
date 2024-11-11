<script>
	import SingleQuestion from './SingleQuestion.svelte';
	import { activeTopic } from '$lib/components/questions/questionState.svelte.js';
</script>

<form>
	<ul>
		{#each activeTopic.questions as question}
			<SingleQuestion {question} />
		{/each}
	</ul>
</form>
