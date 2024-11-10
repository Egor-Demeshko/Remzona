<script>
	import Top from '$lib/components/Top.svelte';
	import Questionary from './Questionary.svelte';
</script>

<div class="questions h-100">
	<Top />
	<div class="questions__second_position">
		<Questionary />
	</div>
</div>

<style>
	.questions {
		display: grid;
		grid-template-columns: 100%;
		grid-template-rows: 170px 1fr;
	}

	.questions__second_position {
		background-color: whitesmoke;
		display: flex;
		flex-direction: column;
	}
</style>
