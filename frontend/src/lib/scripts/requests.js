
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

/**
 * 
 * @param {string} route 
 * @param {string} method 
 * @param {string} data 
 */
export async function send(route, method, data)
{
    const response = await fetch(route, {
        method: method,
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    if(response.ok){
        console.log("DATA SAVED");
    } else {
        console.error("DATA NOT SAVED");
    }
}