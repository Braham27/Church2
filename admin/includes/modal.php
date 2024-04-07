<!-- Excel Modal -->
<div class="modal fade" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="excelModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excelModalLabel">Add Members Using Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Would you like to upload your Excel sheet or download a template?
            </div>
            <div class="modal-footer">
                <!-- Upload Excel Sheet Button -->
                <button type="button" name="uploadExcel" class="btn btn-primary"
                    onclick="document.getElementById('excelFile').click(); $('#excelModal').modal('hide');">
                    Upload Excel Sheet
                </button>
                <!-- Download Template Button -->
                <a href="/admin/files/AddMembers_Template.xlsx" class="btn btn-secondary"
                    download="AddMembers_Template.xlsx">
                    Download Template
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal -->
<!-- SMS Modal -->
<div class="modal fade sms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-contact100">

                <span class="contact100-form-title mb-4">
                    Send A Text
                </span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Member's Name</span>
                    <input class="input100 fl" type="text" name="name" value="">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Phone is required: 12345678">
                    <span class="label-input100">Phone</span>
                    <input class="input100 phone" type="tel" name="email" value="">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Message is required">
                    <span class="label-input100">Message</span>
                    <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                    <span class="focus-input100"></span>
                </div>

                <!-- <div class="container-contact100-form-btn"> -->
                <button class="contact100-form-btn">
                    <span>
                        Submit
                        <!-- <i class="fa fa-long-arrow-right m-l-7" aria-hidden=""></i> -->
                    </span>
                </button>
                <!-- </div> -->
                </form>

            </div>
        </div>
        <div id="dropDownSelect1"></div>
    </div>
</div>

<!-- Email Modal -->

<div class="modal fade email" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-contact100">

                <span class="contact100-form-title mb-4">
                    Send an email
                </span>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Member's Name</span>
                    <input class="input100 fl" type="text" name="name" value="">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Phone is required: 12345678">
                    <span class="label-input100">Email</span>
                    <input class="input100 phone" type="email" name="email" value="">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Title is required: 12345678">
                    <span class="label-input100">Title</span>
                    <input class="input100 title" type="txt" name="title" value="">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Message is required">
                    <span class="label-input100">Message</span>
                    <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                    <span class="focus-input100"></span>
                </div>

                <!-- <div class="container-contact100-form-btn"> -->
                <button class="contact100-form-btn">
                    <span>
                        Submit
                        <!-- <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i> -->
                    </span>
                </button>
                <!-- </div> -->
                </form>

            </div>
        </div>
        <div id="dropDownSelect1"></div>
    </div>
</div>

<!-- User Status Module -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-justify">
            <div class="modal-header text-justify">
                <h5 class="modal-title text-justify" id="modalLabel">Confirm Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to <span id="actionType"></span> the following member(s)?:
                <ul id="memberList" class="text-left"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmBtn">Yes, proceed</button>
            </div>
        </div>
    </div>
</div>