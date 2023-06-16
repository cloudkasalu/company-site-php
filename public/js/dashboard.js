
const member = document.querySelector('#member');

const data = async (id) => {
    try{
        let response =  await fetch(
            `http://127.0.0.1/team/${id}`
        )
        let user = await response.json();
        
        console.log(user);

    }catch(err){
        console.log(err)
    }
  
}

member.addEventListener('change',(e)=>{
    console.log(e.target.value);
    id = e.target.value;

    data(id)
})
