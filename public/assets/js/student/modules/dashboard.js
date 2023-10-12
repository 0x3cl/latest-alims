import { overviewData } from "./dataUtils.js";

export function dashboardData() {
    // async function overViewDom() {
    //     try {
    //         const response = await overviewData();
    //         if(response.status == 200) {
    //             const data = response.data;
    //             const div  = `
    //             <div class="row">
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_admins}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Total Admins
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_users}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Total Users
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_instructors}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Total Instructors
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_students}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Total Students
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_enrolled_instructors}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Enrolled Instructors
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_enrolled_students}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Enrolled Students
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                         <div class="count">
    //                                 <h1>
    //                                     ${data.total_courses}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Courses
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_subjects}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Subjects
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_years}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Years
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
    //                                     ${data.total_sections}
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Sections
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
                                        
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Total Posts
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //                 <div class="col-12 col-md-4 mb-3">
    //                     <div class="card">
    //                         <div class="card-body">
    //                             <div class="count">
    //                                 <h1>
                                    
    //                                 </h1>
    //                             </div>
    //                             <div class="label">
    //                                 Total Assessments
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div
    //             `;
    //             const clean = DOMPurify.sanitize(div);
    //             $('.count-overview').html(clean)
    //         }
    //     } catch(err) {
    //         console.log(err);
    //     }
    // }
    
    // async function userGraphDOM() {
    //     try {
    //         const response = await overviewData();
    //         if(response.status == 200) {
    //             const obj = response.data;
    //             const data = [obj.total_instructors, obj.total_students, obj.total_admins, obj.total_enrolled_instructors, obj.total_enrolled_students];
    
    //             let allEmpty = true;
        
    //             $.each(data, (index, data) => {
    //               if(data !== 0) {
    //                 allEmpty = false;
    //                 return false;
    //               }
    //             });
        
    //             if(!allEmpty) { 
    //               setTimeout(() => {
    //                 $('#card-graph-user').html(DOMPurify.sanitize('<canvas id="users-graph"></canvas>'));
    //                 const ctx = $('#users-graph');
    //                 if(ctx.length > 0) {
    //                   const chart = new Chart(ctx, {
    //                     type: 'doughnut',
    //                     data: {
    //                       labels: ['Instructors', 'Students', 'Administrators', 'Enrolled Instructors', 'Enrolled Students'],
    //                       datasets: [{
    //                         label: 'All Users',
    //                         backgroundColor: [
    //                             '#04f2cf',
    //                             '#f1fa00',
    //                             '#f90850',
    //                             '#00fab3',
    //                             '#fa00ce',
    //                         ],
    //                         data: '' 
    //                       }]
    //                     },
    //                     options: {
    //                     hoverOffset: 4,
    //                       responsive: true,
    //                     }
    //                   });
    //                   chart.data.datasets[0].data = data;
    //                   chart.update();
    //                 }
    //               }, 100);
    //             } else {
    //               $('#card-graph-user').html(DOMPurify.sanitize('<p>No records found</p>'));
    //             }
    //         }
    //     } catch(err) {
    //         console.log(err);
    //     }
    // }
    
    // async function classCourseGraphDOM() {
    //     try {
    //         const response = await overviewData();
    //         if(response.status == 200) {
    //             const obj = response.data;
    //             const data = [obj.total_courses, obj.total_subjects, obj.total_years, obj.total_sections];
    //             let allEmpty = true;
    //             $.each(data, (index, data) => {
    //               if(data !== 0) {
    //                 allEmpty = false;
    //                 return false;
    //               }
    //             });
                
    //             if(!allEmpty) {
    //               setTimeout(() => {
    //                 $('#card-graph-classcourse').html(DOMPurify.sanitize('<canvas id="class-course-graph"></canvas>'));
    //                 const ctx = $('#class-course-graph'); 
    //                 if(ctx.length > 0) {
    //                   const chart = new Chart(ctx, {
    //                     type: 'doughnut',
    //                     data: {
    //                       labels: ['Courses', 'Subjects', 'Years', 'Sections'],
    //                       datasets: [{
    //                         label: 'Class Course',
    //                         backgroundColor: [
    //                             '#04f2cf',
    //                             '#f1fa00',
    //                             '#f90850',
    //                             '#00fab3'
    //                         ],
    //                         data: '' 
    //                       }]
    //                     },
    //                     options: {
    //                     hoverOffset: 4,
    //                       responsive: true,
    //                     }
    //                 });
    //                 chart.data.datasets[0].data = data;
    //                 chart.update(); 
    //                 }
    //               }, 100);
    //             } else {
    //               $('#card-graph-classcourse').html(DOMPurify.sanitize('<p>No records found</p>'));
    //             }
    //         }
    //     } catch (err) {
    //         console.log(err);
    //     }
    // }

    // overViewDom();
    // userGraphDOM();
    // classCourseGraphDOM();
}



