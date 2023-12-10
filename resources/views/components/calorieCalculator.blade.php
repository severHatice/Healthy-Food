
<style>
    
/* Added css for calorieDiv */
#calorieTrackerContainer
{
    display:flex;
    flex-direction: column;
    position:absolute;
    top:80px;
    width:400px;

}
.caloryTrackerDisabledText
{
    position:relative;
    left:10%;
    color:white;
}
#currentTable
{   
    position:relative;
    z-index:+1
}

#submitCalories
{
    position:absolute;
    top:325px;
}

#calorieTrackerContainer h2
{
 color:#1abc9c;
 position:relative;
 left:17%;
 padding-bottom:35px;
 padding-top:35px;

}
.calorieForm
{
    width:60%;
    position:absolute;
    left:15%;
    top:0px;
    border-radius:50px;
    height:660px;
}
#calorieDiv form
{
    display: flex;
    flex-direction: column;
    position:relative;
    align-content: right;
    
    gap:20px;
    

}
#calorieDiv
{
    height:3000px;
    position:relative;
    left:-0px;
    

}

#calorieFormFields
{
    display:flex;
    flex-direction: column;
    gap:2%;
}
/* CALENDER FOR CALORIE TRACKER*/


ul {list-style-type: none;}

.calender {
    font-family: Verdana, sans-serif;
    position:relative;
    top:-2535px;
    border-radius:60px;
    width:60%;
    left:15%;
    padding-top:35px;


}

.month {
  padding: 5px 5px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 0px;
}

.month .next {
  float: right;
  padding-top: 0px;
}

.weekdays {
  margin: 0;
  padding: 0px 10px;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 11.5%;
  color: #666;
  text-align: center;
}

.days {
  padding: 5px 2px;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 11%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
  position:relative;
  left:4px;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}

.inactiveDate{
    color:white;
}

/* Add media queries for smaller screens */
@media screen and (max-width:720px) {
  .weekdays li, .days li {width: 13.1%;}
}

@media screen and (max-width: 420px) {
  .weekdays li, .days li {width: 12.5%;}
  .days li .active {padding: 2px;}
}

@media screen and (max-width: 290px) {
  .weekdays li, .days li {width: 12.2%;}
}
</style>

<div id="calorieTrackerContainer">
<div class="slider_overlay" id="calorieDiv">
<h2>Calorie Tracker</h2>
            <div>
            
                <div>
                    <div>
                        <div>
                            <div>
                            
                            @auth
                            <form class ="calorieForm" action="/calorieTracker" method="POST">
                                @csrf
                                <div id="calorieFormFields">
                                    <div>
                                        <label for="food_item" style="color:white;font-size:10px;">Food Item: </label>
                                        <input type="text" name="food_item" value="{{old('food_item')}}"/>
                                        @error('food_item')
                                            <p style="color:red;font-size:10px;">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="calories"style="color:white;font-size:10px;">Calories: </label>
                                        <input type="text" name="calories_number" value="{{old('calories_number')}}" />
                                            @error('calories_number')
                                                <p style="color:red;font-size:10px;">{{ $message }}</p>
                                            @enderror
                                    </div>
                                    <div>
                                        <label for="date"style="color:white;font-size:10px;">
                                            Date:
                                        </label>
                                        <input type="text" name="date" value="{{old('date')}}">
                                            @error('date')
                                                <p style="color:red;font-size:10px;">{{ $message }}</p>
                                            @enderror
                                    </div>

                                    <div>
                                        <label for="time"style="color:white;font-size:10px;">
                                            Time:
                                        </label>
                                        <input type="text" name="time" value="{{old('time')}}">
                                            @error('time')
                                                <p style="color:red;font-size:10px;">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" id="submitCalories">
                                        Submit
                                    </button>

        
                                </div>
                            </form>
                            @else
                            <p class="caloryTrackerDisabledText">Please login to use the calory tracker.</p>

                            @endAuth
                            </div>

                        </div>

                    </div>

                </div>
            </div>
</div>
@auth
<div class="calender">
        <div class="month">
            <ul>
                <li class="prev">&#10094;</li>
                <li class="next">&#10095;</li>
                <li>December</li>
            </ul>
        </div>
        
        <ul class="weekdays">
            <li>Mo</li>
            <li>Tu</li>
            <li>We</li>
            <li>Th</li>
            <li>Fr</li>
            <li>Sa</li>
            <li>Su</li>
        </ul>

        <ul class="days">  
            <li> <span class="inactiveDate">27</span></li>
            <li> <span class="inactiveDate">28</span></li>
            <li> <span class="inactiveDate">29</span></li>
            <li> <span class="inactiveDate">30</span></li>
            <li><span class="dateEntry">1</span></li>
            <li><span class="dateEntry">2</span></li>
            <li><span class="dateEntry">3</span></li>
            <li><span class="dateEntry">4</span></li>
            <li><span class="dateEntry">5</span></li>
            <li><span class="dateEntry">6</span></li>
            <li><span class="dateEntry">7</span></li>
            <li><span class="dateEntry">8</span></li>
            <li><span class="dateEntry">9</span></li>
            <li><span class="dateEntry">10</span></li>
            <li><span class="dateEntry">11</span></li>
            <li><span class="dateEntry">12</span></li>
            <li><span class="dateEntry">13</span></li>
            <li><span class="dateEntry">14</span></li>
            <li><span class="dateEntry">15</span></li>
            <li>16</li>
            <li>17</li>
            <li>18</li>
            <li>19</li>
            <li>20</li>
            <li>21</li>
            <li>22</li>
            <li>23</li>
            <li>24</li>
            <li>25</li>
            <li>26</li>
            <li>27</li>
            <li>28</li>
            <li>29</li>
            <li>30</li>
            <li>31</li>
        </ul>
        @endAuth
</div>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

//HIGHLIGHTS current date on CALENDER
let currentdate = new Date(); 
currentdate.getDate()
let days = document.querySelectorAll(".dateEntry");
let searchText = currentdate.getDate();
let found;
//console.log(currentdate.getDate());
for (let i = 0; i < days.length; i++) 
{
  if (days[i].textContent == searchText) 
  {
    days[i].classList.add("active");
    break;
  }
}
//let datetime = "Last Sync: " + currentdate.getDate() + "/"
 //               + (currentdate.getMonth()+1)  + "/" 
 //               + currentdate.getFullYear() + " @ "  
 //               + currentdate.getHours() + ":"  
 //               + currentdate.getMinutes() + ":" 
 //               + currentdate.getSeconds();
  
//creates table function
function tableCreate(entry,length,array) {
  let passed = false;
  let timeCreated = false;
  let caloriesCreated = false;
  let itemCreated = false;
  const body = entry,
        tbl = document.createElement('table');
        
  tbl.style.width = '100px';
  tbl.style.border = '1px solid black';
  tbl.style.position = "absolute";
  tbl.style.backgroundColor="white";
  tbl.id = "currentTable";
  let kCalSum=0;

  for (let i = 0; i < length; i++) {
    const tr = tbl.insertRow();
    for (let j = 1; j < 4; j++) {
     // if (i === 2 && j === 1) {
     //   break;
      //} else {
    const td = tr.insertCell();
    if(i===0 && j===1)
    {
        if(timeCreated===false)
            {
                timeCreated=true;
                td.appendChild(document.createTextNode(`Time`));
            }
        else{
            td.appendChild(document.createTextNode(array[i][j]));
        }          
    }
    else if(i===0 && j===2)
    {
                if(itemCreated===false)
                {
                    itemCreated=true;
                    td.appendChild(document.createTextNode(`Item`));
                }
                else
                {

                        td.appendChild(document.createTextNode(array[i][j]));
                    
                }
    }
    else if(i===0 && j===3)
    {

            if(caloriesCreated===false)
            {
                caloriesCreated=true;
                td.appendChild(document.createTextNode(`Calories`));
                i=i-1;
            }
            else
            {
                    td.appendChild(document.createTextNode(array[i][j] +" kCal"));
                    kCalSum+=array[i][j];
            }
    }   
    else if (i === 1 && j === 1 && passed===false) 
    {
            passed=true;
            td.appendChild(document.createTextNode(array[i][j]))
          //td.setAttribute('rowSpan', '2');
    }
    else
    {
        if(j===3)
        {
            td.appendChild(document.createTextNode(array[i][j] +" kCal"));     
            kCalSum+=array[i][j];
        }
        else{
            td.appendChild(document.createTextNode(array[i][j]));        
        }
                     
    }
        //console.log(kCalSum);
        td.style.border = '1px solid black';
        td.style.color="black";

      }
    }
    if(!(length==0))
    {
        let tr = tbl.insertRow();
        tr.insertCell().appendChild(document.createTextNode(""));
        tr.insertCell().appendChild(document.createTextNode("Total kCal"));
        tr.insertCell().appendChild(document.createTextNode(kCalSum));
        tr.style.color="grey";
        body.appendChild(tbl);
    }

  } 
  
//}


//creates on click function and takes data from back end
let dateEntries = document.querySelectorAll(".dateEntry");
for(i=0;i<dateEntries.length;i++){
    //console.log(dateEntries);
    let entry = dateEntries[i];
    dateEntries[i].addEventListener("click",(e)=>{
        e.preventDefault();
        let text = entry.innerText
        if(parseInt(text)<10)
        {
            text = "0" + text;
        }
        let loopDay="12/12/" + text;
        let caloryData = loadCalories();
        //create table and calls create table function
        let currentTable = document.querySelector("#currentTable");
        if(currentTable){currentTable.remove()};

        caloryData = caloryData[0];
        let sortedCalories =[];
        //console.log(caloryData);
        for(i=0;i<caloryData.length;i++)
        {
            let loopDate = caloryData[i][0];
                
            if (loopDate==loopDay)
            {
                //console.log(caloryData[i]);   
                sortedCalories.push(caloryData[i]);
                
            }
            //console.log(sortedCalories.length)
        }
        let numArray = {};
        for(i=0;i<sortedCalories.length;i++)
        {
            let hours = parseInt((sortedCalories[i][1]).split(':')[0]); 
            let minutes = parseInt((sortedCalories[i][1]).split(':')[1]);
            let timeTotal=(hours*60)+minutes;
            numArray[timeTotal+""+i] = sortedCalories[i];

        }
        //numArray.sort(function(a, b) {
        //return a - b;
        //});
        
        newSortedCalories = Object.entries(numArray).sort(function(a, b) {
                            if (parseInt(a[0].slice(0,-1)) === parseInt(b[0].slice(0,-1)) ) {
                                return -1;
                            }

                            if (parseInt(a[0].slice(0,-1))  < parseInt(b[0].slice(0,-1)) ) {
                                return 0;
                            }

                            if (parseInt(a[0].slice(0,-1))  > parseInt(b[0].slice(0,-1)) ) {
                                return 1;
                            }

                            return 0;
                            });
        
        timeSortedCalories=[];
        for(i=0;i<newSortedCalories.length;i++)
        {
            timeSortedCalories.push(newSortedCalories[i][1]);
        }




        //console.log(timeSortedCalories)
        //console.log(entry);
        tableCreate(entry,timeSortedCalories.length,timeSortedCalories)
        //console.log(dateEntries)
        
        
        
    
    //console.log(this);
})

}

//function to take calorie data from backend
let myOutput = "";
function loadCalories() {
    const promise1 = axios.get("http://127.0.0.1:8000/calorieTracker")
.then(response => response.data);
//.catch((error) => console.log(error));
Promise.all([promise1]).then(function(values){
    
    myOutput = values})
    return myOutput;
}




</script>



