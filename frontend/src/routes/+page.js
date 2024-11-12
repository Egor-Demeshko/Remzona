import { getTopics } from "$lib/components/questions/questionState.svelte";

export async function load(){
    const topics = await getTopics() ?? {};
    return {topics};
} 