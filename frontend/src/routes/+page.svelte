<script>
	import QuestionPage from '$lib/components/questions/QuestionPage.svelte';
	import { setActiveTopicFrom } from '$lib/components/questions/questionState.svelte.js';

	let { data } = $props();
	const { topics } = data;

	setActiveTopicFrom(topics);
</script>

<div class="wrapper">
	<div class="container h-100">
		<QuestionPage />
	</div>
</div>

<style>
	.container {
		margin: 0 auto;
		max-width: 960px;
	}

	.wrapper {
		width: 100vw;
		height: 100vh;
		overflow: scroll;
	}
</style>
