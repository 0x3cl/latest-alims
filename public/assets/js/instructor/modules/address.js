
// SELECT ADDRESS CALLBACK FROM API
export function address() {
    $.when(
        $.ajax({
            url: 'https://psgc.gitlab.io/api/provinces.json',
            method: 'GET',
        }),
        $.ajax({
            url: 'https://psgc.gitlab.io/api/districts.json',
            method: 'GET',
        })
    ).done(function(provincesResponse, districtsResponse) {
        const provinces = provincesResponse[0];
        const districts = districtsResponse[0];
        
        const combinedData = [];
        provinces.forEach(function(province) {
            province.type = 'province';
            combinedData.push(province);
        });
        districts.forEach(function(district) {
            district.type = 'district';
            combinedData.push(district);
        });
        combinedData.sort((a, b) => a.name.localeCompare(b.name))
        
        combinedData.forEach(function(data) {
            const div = `
                    <option value="`+data.name+`" data-id=`+data.code+`>`+data.name+`</option>
                `;
                $('select#state').append(div);
        });
        });
    
    
    // display city json to select options when province is on changed
    $('select#state').change(function() {
        const province_code = $(this).find('option:selected').data('id');
        
        if(province_code != undefined) {
            $.ajax({
                url: 'https://psgc.gitlab.io/api/provinces/'+province_code+'/cities-municipalities.json',
                method: 'GET',
                success: function(data) {
                    processData(data);
                }, 
                error: function(xhr, status, error) {
                    if (xhr.status === 404) {
                        console.log("Cities not found for province with code " + province_code + ". Trying districts...");
                        $.ajax({
                            url: 'https://psgc.gitlab.io/api/districts/'+province_code+'/cities-municipalities.json',
                            method: 'GET',
                            success: function(data) {
                                processData(data);
                            }, 
                            error: function(xhr, status, error) {
                                console.log("Error fetching cities/districts for province with code " + province_code);
                            }
                        });
                    } else {
                        console.log("Error fetching cities for province with code " + province_code);
                    }
                }
            });
            
        } else {
            let div = `
                <option value="" data-id="">Select District / Province</option>
            `;
            $('select#city').html(div);
        }

        function processData(data) {
            data.sort((a, b) => a.name.localeCompare(b.name));
            let div = '';
            data.forEach(function(data) {
                div += `
                    <option value="`+data.name+`" data-id=`+data.code+`>`+data.name+`</option>
                `;
            });
            $('select#city').html(div);
        }
        
    });
      
      
}