<script>
	import BottomButtons from '$lib/components/bottomButtons/BottomButtons.svelte';
	import QuestionPage from '$lib/components/questions/QuestionPage.svelte';
	import { setActiveTopicFrom } from '$lib/components/questions/questionState.svelte.js';

	let { data } = $props();
	const { topics } = data;

	setActiveTopicFrom(topics);
</script>

<div class="wrapper">
	<div class="container h-100">
		<QuestionPage />

		<div class="bottom_position">
			<BottomButtons />
		</div>
	</div>
</div>

<style>
	.container {
		margin: 0 auto;
		max-width: 960px;
	}

	.bottom_position {
		position: absolute;
		bottom: 2rem;
		left: 50%;
		transform: translateX(-50%);
		max-width: 420px;
	}

	.wrapper {
		width: 100vw;
		height: 100vh;
		overflow: scroll;
		position: relative;
	}
</style>
