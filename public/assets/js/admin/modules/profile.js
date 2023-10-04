import { adminData, adminDataByID } from './dataUtils.js';
import { formatEmptyData, userRoleFormatter, seeMoreLess, format_admin_id } from './utils.js';
import { convert_number_date, ucwords } from './utils.js';

export function viewProfile() {

    // profile data lists
    adminDataByID().then((data) => {
        
    });

    // other profiles of admins
    adminData().then((data) => {
        let div = "";
      
        const filteredData = data.data.filter(function (obj) {
          return obj.id !== '10';
        });
      
        filteredData.forEach((data) => {
          div += `
          <div class="d-flex mt-3 other-admins">
            <div class="other-profiles">
              <div class="profile-image">
                <img src="/uploads/avatar/${data.avatar}" alt="" srcset="">
              </div>
              <div class="other-profile-info">
                <h6>${ucwords(data.firstname + ' ' + data.lastname)}</h6>
                <p class="text-uppercase fw-bold">${userRoleFormatter(data.role)} <span class="badge-admin mb-1"><i class='bx bxs-badge-check'></i></span></p>
              </div>
            </div>
          </div>
          `;
        });
      
        $('#other-admin-lists').html(div);

        $('.site-header').removeClass('skeleton-image');

    });
}

export function profileActions() {
    $(document).on('click', '#toggle-update-bio, #toggle-cancel-bio', function() {
        const isUpdate = $(this).attr('id') === 'toggle-update-bio';
        const div = isUpdate
            ? `<textarea class="form-control" id="bio-input" placeholder="Write here..." rows="5"></textarea>
                <button class="btn ${isUpdate ? 'btn-custom-dark' : 'btn-bordered'} w-100 mt-3" id="control-update-bio">Save</button>`
            : viewProfile();
    
        $(this)
            .removeClass(isUpdate ? 'btn-custom-dark' : 'btn-bordered')
            .addClass(isUpdate ? 'btn-bordered' : 'btn-custom-dark')
            .text(isUpdate ? 'Discard' : 'Update Bio')
            .attr('id', isUpdate ? 'toggle-cancel-bio' : 'toggle-update-bio');
        $('.bio div').html(div);
    });
}