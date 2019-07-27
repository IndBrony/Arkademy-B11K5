function biodata ()
{
  var obj = {
        name       : "Fuad Mustamirrul Ishlah", 
        age        : 18,
    	address    : "Wonosobo, Jawa Tengah",
    	hobbies    : ["Gaming", "Listening Music", "Reading"],
    	is_married : false,
    	list_school     : [
            {
            	name : "SD Negeri Tawangsari",
                year_in : 2007,
                year_out : 2008,
                major : null,
            },
            {
            	name : "MI Maarif Kliwonan",
                year_in : 2008,
                year_out : 2013,
                major : null,
            },
            {
            	name : "SMP Negeri 1 Wonosobo",
                year_in : 2013,
                year_out : 2016,
                major : null,
            },
            {
            	name : "SMK Negeri 1 Wonosobo",
                year_in : 2016,
                year_out : 2019,
                major : "Rekayasa Perangkat Lunak",
            },
      ],
  		skills     : [
          {
              skill_name : "Android App Development", 
              level : "Beginner"
          }, 
          {
              skill_name : "Java Programmer", 
              level : "Beginner",
          },
          {
              skill_name : "Back-End Web Developer (PHP)", 
              level : "Beginner",
          }, 
          {
              skill_name : "Front-End Web Developer (HTML5,CSS3,JavaScript)", 
              level : "Beginner",
          }
      ],
        interest_in_coding : true,
  };
  return JSON.stringify(obj);
}
//contoh pemanggilan
biodata();
