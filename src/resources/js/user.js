$(document).ready(function () {
  /** Create a user **/
  $('#submitFormUser').submit(function (e) {
    e.preventDefault()
    let form = $(this)
    let url = form.attr('action')
    let formData = new FormData(form[0])
    $.ajax({
      type: form.attr('method'),
      url: url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.success) {
          toastr.success(response.message)
          setTimeout(() => {
            window.location.href = route_index
          }, 2000)
        } else {
          toastr.error(response.message)
        }
      },
      error: function (jQxhr, textStatus, errorThrown) {
        if (jQxhr.status === 422) {
          let errors = jQxhr.responseJSON.errors
          for (let [key, value] of Object.entries(errors)) {
            showError(key, value[0])
          }
        }
      }
    })
  })

  /** Update a user **/
  $("#updateFormUser").submit(function (e) {
    e.preventDefault()
    let form = $(this)
    let url = form.attr('action')
    let formData = new FormData(form[0])
    $.ajax({
      type: form.attr('method'),
      url: url,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.success) {
          toastr.success(response.message)
          setTimeout(() => {
            window.location.href = route_index
          }, 2000)
        } else {
          toastr.error(response.message)
        }
      },
      error: function (jQxhr, textStatus, errorThrown) {
        if (jQxhr.status === 422) {
          let errors = jQxhr.responseJSON.errors
          for (let [key, value] of Object.entries(errors)) {
            showError(key, value[0])
          }
        }
      }
    })
  })

  /** Delete a user **/
  $('.btn-delete-user').on('click', function() {
    let parent = $(this).parent()
    Swal.fire({
      title: 'Delete this user',
      text: 'Are you sure you want to delete this user?',
      icon: 'error',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      cancelButtonText: 'Cancel',
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        $('div.spanner').addClass('show')
        $.ajax({
          url: $(this).data('url'),
          method: 'Delete',
          cache: false,
          contentType: false,
          processData: false,
          success: function (response) {
            if (response.success) {
              toastr.success(response.message)
              parent.closest('tr').remove();
            } else {
              toastr.error(response.message)
            }
          },
          error: function (jQxhr, textStatus, errorThrown) {
            if (jQxhr.status === 422) {
              toastr.error(jQxhr.responseJSON.message)
            }
          }
        })
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        // Do on cancel
      }
    })
  })
})
