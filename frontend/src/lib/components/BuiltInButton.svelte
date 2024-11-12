<script>
	import { BUTTONS_TEXTS } from '$lib/const';

	/**
	 * @type {{type: string, callbackOnClick: any}}
	 */
	let { type, callbackOnClick } = $props();

	const text = BUTTONS_TEXTS[type];
</script>

<button class="wrapper" onclick={() => callbackOnClick(type)}>{text}</button>

<style>
	button {
		cursor: pointer;
		border: none;
		background-color: transparent;
		transition:
			background 0.4s ease,
			color 0.4s ease;
		text-align: center;
		color: black;
		font-size: clamp(1.25rem, 2.2vw, 1.7rem);
		font-weight: 600;
		width: 100%;
		padding: clamp(0.5rem, 1.3vw, 1rem) clamp(0.85rem, 1.9vw, 1.5rem);
	}

	button:hover {
		color: white;
		background-color: var(--choice-color-hover);
	}
</style>
