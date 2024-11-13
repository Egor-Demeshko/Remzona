<script>
	import { notificationsState } from '$lib/components/notifications/notificationsState.svelte.js';
	import { fly } from 'svelte/transition';
</script>

<div class="notifications">
	{#each notificationsState.notificationsQueue as notification}
		<div in:fly={{ y: 100 }} out:fly={{ x: 100 }} class="notification {notification.type}">
			{notification.message}
		</div>
	{/each}
</div>

<style>
	.notifications {
		display: flex;
		flex-direction: column;
		gap: 1rem;
		max-width: 280px;
	}

	.notification {
		border-radius: 8px;
		padding: 1.5rem;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		font-weight: 600;
		color: white;
	}

	.notification_ok {
		background-color: green;
	}

	.notification_error {
		background-color: red;
	}
</style>
