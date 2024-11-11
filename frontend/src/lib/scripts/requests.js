
/**
 * 
 * @param {string} route 

 */
export async function requestToJson(route)
{
    try{
        const obj = await fetch(route)
            .then((response) => {
                if(response.ok){
                    return response.json();
                }
            });

        if(obj){
            return obj;
        }
        
        throw new Error(`Data from ${route} is not an array or could parse json to array`);
    } catch ($e){
        // TODO: add notification
        console.error($e);
    }
}