<script>
	import BottomButtons from '$lib/components/bottomButtons/BottomButtons.svelte';
	import Notifications from '$lib/components/notifications/Notifications.svelte';
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

	<div class="notifications__position">
		<Notifications />
	</div>
</div>

<style>
	.container {
		margin: 0 auto;
		max-width: 960px;
	}

	.notifications__position {
		position: absolute;
		bottom: 2rem;
		right: 2rem;
		z-index: 10;
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
