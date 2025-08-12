<!--  Footer. -->
<footer class="text-center mt-5" style="background-color: #ffffff">

    <div class="container pt-3 pb-3">

        <section class="mb-2">
            <a class="btn btnoutlinelight  m-1" href="#!" role="button">
                <i class="ri-facebook-line"></i>
            </a>

            <a class="btn btnoutlinelight m-1" href="#!" role="button">
                <i class="ri-twitter-line"></i>
            </a>

            <a class="btn btnoutlinelight  m-1" href="#!" role="button">
                <i class="ri-google-line"></i>
            </a>

            <a class="btn btnoutlinelight m-1" href="#!" role="button">
                <i class="ri-instagram-line"></i>
            </a>

            <a class="btn btnoutlinelight m-1" href="#!" role="button">
                <i class="ri-linkedin-line"></i>
            </a>

            <a class="btn btnoutlinelight m-1" href="#!" role="button">
                <i class="ri-github-line"></i>
            </a>

        </section>

    </div>

    <div class="text-center p-3" style="background-color: #f4f7fa;">
        © 2025 Copyright:
        <a class="text-muted text-decoration-none" href="https://mdbootstrap.com/">boltheight.com</a>
    </div>

</footer>

{{-- Non Aviation Modal --}}

<!-- pilot Modal Start -->
<div class="modal fade" id="pilot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    {{-- <h1 class="modal-title fs-5">
                        {{ optional($candidateDetail->jobPosition)->id ? 'Edit Pilot Details' : 'Add Pilot Details' }}
                    </h1> --}}
                    <h1 class="modal-title fs-5">
                        {{ $candidateDetail->jobPosition->id ?? null ? 'Edit Pilot Details' : 'Add Pilot Details' }}
                    </h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- id="add-pilot-details" --}}
            <form id="add-pilot-details">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Preferred Location <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="preferred_location"
                                    placeholder="if applying to a specific hub or location"
                                    class="form-control typeText"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->preferred_location ?? '' : '' }}"
                                    required>
                            </div>

                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Date of Last Flight<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="date_of_last_flight" placeholder="Date of Last Flight"
                                    class="form-control"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->date_of_last_flight ?? '' : '' }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Select Latest Fleet<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="latest_fleet" required>
                                    <option>Latest Fleet</option>
                                    <option value="A300-600"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_fleet == 'A300-600' ? 'selected' : '' }}>
                                        A300-600</option>
                                    <option value="A300-B4"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_fleet == 'A300-B4' ? 'selected' : '' }}>
                                        >A300-B4</option>
                                    <option value="A310"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_fleet == 'A310' ? 'selected' : '' }}>
                                        A310</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Select Latest Rank<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="latest_rank" required>
                                    <option value="captain"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_rank == 'captain' ? 'selected' : '' }}>
                                        Captain</option>
                                    <option value="airman"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_rank == 'airman' ? 'selected' : '' }}>
                                        Check Airman</option>
                                    <option value="check-captain"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_rank == 'check-captain' ? 'selected' : '' }}>
                                        Check Captain</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Licence/Certificate<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="certificate_no" required>
                                    <option value="atpl-heli-licence"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'atpl-heli-licence' ? 'selected' : '' }}>
                                        ATPL - Heli Licence</option>
                                    <option value="cpl"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl' ? 'selected' : '' }}>
                                        Commercial Pilot Licence</option>
                                    <option value="cpl-heli"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl-heli' ? 'selected' : '' }}>
                                        Commercial Pilot Licence - Heli</option>
                                    <option value="cpl-atpl-frozen"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl-atpl-frozen' ? 'selected' : '' }}>
                                        CPL including ATPL Frozen</option>
                                    <option value="mpl"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl-atpl-frozen' ? 'selected' : '' }}>
                                        Multi-Crew Pilot Licence</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Country of Licence/Approval<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="country_of_licence" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->country_of_licence == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Licence Number<span
                                        class="text-danger">*</span></label>
                                <input type="number" placeholder="Licence Number" name="licence_no"
                                    class="form-control"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->licence_no ?? '' : '' }}"
                                    maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Total Hours on Fleet in Rank<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="total_hours_on_fleet"
                                    placeholder="Enter Total flight house" class="form-control"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->total_hours_on_fleet ?? '' : '' }}"
                                    name="total_hours_on_fleet" maxlength="50" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Select Valid Medical <span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="valid_medical" required>
                                    <option value="Yes"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->valid_medical == 'Yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="No"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->valid_medical == 'No' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Other Non-Flying Position<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Other Non-Flying Position"
                                    name="non_flying_position"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->non_flying_position ?? '' : '' }}"
                                    class="form-control" maxlength="50" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- pilot Modal End -->

<!-- Skilled / Non Skilled Staff Job Modal Start -->
<div class="modal fade" id="skilled_non_skilled" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">
                        {{ $candidateDetail->jobPosition->id ?? null ? 'Edit Skill Details' : 'Add Skill Details' }}
                    </h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="add-skilled-details">
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Preferred Location<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="preferred_location"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->preferred_location ?? '' : '' }}"
                                    placeholder="if applying to a specific hub or location"
                                    class="form-control typeText" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Latest/Current Company<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="latest_current_company"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->latest_current_company ?? '' : '' }}"
                                    placeholder="Company Name or N/A if not employed" class="form-control"
                                    maxlength="70" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Skilled / Non Skilled Staff Job Modal End -->


<!-- cabin crew Modal Start -->
<div class="modal fade" id="cabin_crew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">
                        {{ $candidateDetail->jobPosition->id ?? null ? 'Edit Cabin Crew Details' : 'Add Cabin Crew  Details' }}
                    </h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="add-cabin-crew-details">
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Preferred Location<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="preferred_location"
                                    placeholder="if applying to a specific hub or location"
                                    class="form-control typeText"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->preferred_location ?? '' : '' }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Latest Fleet<span class="text-danger">*</span></label>
                                <input type="text" name="latest_fleet" placeholder="A320, A35778"
                                    class="form-control"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->latest_fleet ?? '' : '' }}"
                                    maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Height<span class="text-danger">*</span></label>
                                <input type="number" name="cabin_crew_height" placeholder="in cm"
                                    class="form-control"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->cabin_crew_height ?? '' : '' }}"
                                    maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Weight<span class="text-danger">*</span></label>
                                <input type="number" name="cabin_crew_weight"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->cabin_crew_weight ?? '' : '' }}"
                                    placeholder="in kg" class="form-control" maxlength="50" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Seve</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- cabin crew Modal End -->


<!-- engineer Modal Start -->
<div class="modal fade" id="engineer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">
                        {{ $candidateDetail->jobPosition->id ?? null ? 'Edit Engineer Details' : 'Add Engineer Details' }}
                    </h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-engineer-details">
                <div class="modal-body">
                    <div class="row ">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Preferred Location<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="preferred_location"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->preferred_location ?? '' : '' }}"
                                    placeholder="if applying to a specific hub or location"
                                    class="form-control typeText" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Select Latest Rank<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="latest_rank" required>
                                    <option value="captain"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_rank == 'captain' ? 'selected' : '' }}>
                                        Captain</option>
                                    <option value="airman"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_rank == 'airman' ? 'selected' : '' }}>
                                        Check Airman</option>
                                    <option value="check-captain"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_rank == 'check-captain' ? 'selected' : '' }}>
                                        Check Captain</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Licence/Certificate<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="certificate_no" required>
                                    <option value="atpl-heli-licence"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'atpl-heli-licence' ? 'selected' : '' }}>
                                        ATPL - Heli Licence</option>
                                    <option value="cpl"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl' ? 'selected' : '' }}>
                                        Commercial Pilot Licence</option>
                                    <option value="cpl-heli"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl-heli' ? 'selected' : '' }}>
                                        Commercial Pilot Licence - Heli</option>
                                    <option value="cpl-atpl-frozen"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl-atpl-frozen' ? 'selected' : '' }}>
                                        CPL including ATPL Frozen</option>
                                    <option value="mpl"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'cpl-atpl-frozen' ? 'selected' : '' }}>
                                        Multi-Crew Pilot Licence</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Country of Licence/Approval<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="country_of_licence" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->country_of_licence == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Licence Number<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="licence_no"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->licence_no ?? '' : '' }}"
                                    placeholder="Licence Number" class="form-control" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Latest Airframe<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="engineer_latest_airframe" required>
                                    <option disabled>Select Latest Airframe</option>
                                    <option value="A2201"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'A2201' ? 'selected' : '' }}>
                                        A2201</option>
                                    <option value="A3101"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'A3101' ? 'selected' : '' }}>
                                        A3101</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Current Engine Type<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="engineer_current_engine_type" required>
                                    <option disabled>Select Current Engine Type</option>
                                    <option value="Rolls Royce"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'Rolls Royce' ? 'selected' : '' }}>
                                        Rolls Royce</option>
                                    <option value="Mahindra"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->certificate_no == 'Mahindra' ? 'selected' : '' }}>
                                        Mahindra</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Seve</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- engineer Modal End -->


<!-- dispatcher Modal Start -->
<div class="modal fade" id="dispatcher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">
                        {{ $candidateDetail->jobPosition->id ?? null ? 'Edit Dispatcher Details' : 'Add Dispatcher Details' }}
                    </h1>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-dispatcher-details">
                <div class="modal-body">
                    <div class="row dispatcher">

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Preferred Location<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="preferred_location"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->preferred_location ?? '' : '' }}"
                                    placeholder="if applying to a specific hub or location"
                                    class="form-control typeText" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Date of Last Flight<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="dispatcher_last_flight"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->dispatcher_last_flight ?? '' : '' }}"
                                    placeholder="Date of Last Flight" class="form-control " required="">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Latest Fleet<span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="latest_fleet" required>
                                    <option disabled>Select Latest Airframe</option>
                                    <option value="A220202"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_fleet == 'A220202' ? 'selected' : '' }}>
                                        A220</option>
                                    <option value="A312020"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->latest_fleet == 'A312020' ? 'selected' : '' }}>
                                        A310</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Dispatcher Approval<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="dispatcher_approval" required>
                                    <option disabled>Select Dispatcher Approval</option>
                                    <option value="Yes"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->dispatcher_approval == 'Yes' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="No"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->dispatcher_approval == 'No' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Approval Authority<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="dispatcher_approval_authority" required>
                                    <option disabled>Select Approval Authority</option>
                                    <option value="indigo"
                                        {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->dispatcher_approval_authority == 'indigo' ? 'selected' : '' }}>
                                        Indigo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Licence/Certificate<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="certificate_no"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->certificate_no ?? '' : '' }}"
                                    placeholder="Date of Last Flight" class="form-control " required="">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Country of Licence/Approval<span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="country_of_licence" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ isset($candidateDetail) && optional($candidateDetail->jobPosition)->country_of_licence == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-1">Licence Number<span
                                        class="text-danger">*</span></label>
                                <input type="number" placeholder="Licence Number"
                                    value="{{ isset($candidateDetail) ? optional($candidateDetail->jobPosition)->licence_no ?? '' : '' }}"
                                    name="licence_no" class="form-control" maxlength="50" required="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Seve</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- dispatcher Modal End -->


<!-- aviations type all modals end---------------------------------------jkljk544444444444gh=-=------------------------------------------------------->



<!--- profile edit modal start-->
<div class="modal fade" id="profile_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Basic details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('frontend.update-profile-details') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row profile_form input_form">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">First Name<span class="text-danger">*</span></label>
                                <input type="text" placeholder="First Name" name="first_name"
                                    class="form-control typeText" value="{{ $user->first_name }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Last Name<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Last Name" name="last_name"
                                    class="form-control typeText" value="{{ $user->last_name }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Mobile Number<span class="text-danger">*</span></label>
                                <input type="number" placeholder="Mobile Numbe" name="phone"
                                    class="form-control typeNumber" value="{{ $user->phone }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Email id<span class="text-danger">*</span></label>
                                <input type="email" placeholder="Email" name="email" class="form-control"
                                    value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Country <span class="text-danger">*</span></label>
                                <select name="country" name="country" class="form-control selects1">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $user->country == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">State <span class="text-danger">*</span></label>
                                <select name="state" class="form-control selects1">
                                    @foreach ($states->where('country_id', $user->country) as $state)
                                        <option value="{{ $state->id }}"
                                            {{ $user->state == $state->id ? 'selected' : '' }}>
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">City<span class="text-danger">*</span></label>
                                <select name="city" class="form-control selects1">
                                    @foreach ($cities->where('state_id', $user->state) as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $user->city == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Gender<span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="gender" required>
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Add availability to join <span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="availability" required>
                                    <option value="15_days"
                                        {{ optional($user->candidateDetail)->availability == '15_days' ? 'selected' : '' }}>
                                        15 Days</option>
                                    <option value="1_month"
                                        {{ optional($user->candidateDetail)->availability == '1_month' ? 'selected' : '' }}>
                                        1 Month</option>
                                    <option value="2_months"
                                        {{ optional($user->candidateDetail)->availability == '2_months' ? 'selected' : '' }}>
                                        2 Months</option>
                                    <option value="3_months"
                                        {{ optional($user->candidateDetail)->availability == '3_months' ? 'selected' : '' }}>
                                        3 Months</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label mb-0">Experience Status <span
                                    class="text-danger">*</span></label>
                            <div class="d-flex gap-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_experienced"
                                        id="experienced" value="1"
                                        {{ optional($user->candidateDetail)->is_experienced == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="experienced">
                                        I'm experienced
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_experienced"
                                        id="fresher" value="0"
                                        {{ optional($user->candidateDetail)->is_experienced == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fresher">
                                        I'm a fresher
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--- profile edit modal end-->

<!-- KEY Skill Modal Start -->
<div class="modal fade" id="skill_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">Key skills</h1>
                    <p class="text-muted modal_pText">Mention skills like programming languages (Java, Python),
                        softwares (Microsoft Word, Excel) and more, to show your technical expertise.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="skill-add-form">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mb-4">
                        <div class="form-group select2form">
                            <label class="text-dark">Skill / software name</label>
                            <select class="select2 skill-select form-control block" name="skills[]"
                                multiple="multiple" style="width: 100%">
                                <option value="it_security"
                                    {{ in_array('it_security', $selectedSkillKeys ?? []) ? 'selected' : '' }}>It
                                    Security</option>
                                <option value="chat_support"
                                    {{ in_array('chat_support', $selectedSkillKeys ?? []) ? 'selected' : '' }}>Chat
                                    Support</option>
                                <option value="project_management"
                                    {{ in_array('project_management', $selectedSkillKeys ?? []) ? 'selected' : '' }}>
                                    Project Management</option>
                                <option value="ithead"
                                    {{ in_array('ithead', $selectedSkillKeys ?? []) ? 'selected' : '' }}>It Head
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Skills</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- KEY Skill Modal End -->

<!-- iT Skill Modal Start -->

{{-- Add IT Skills Modal --}}
<div class="modal fade" id="it_skill_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">Add Your IT Skills</h1>
                    <p class="text-muted modal_pText">Add skills that best define your expertise, for e.g, Direct
                        Marketing, Oracle, Java, etc. (Minimum 1) Skills</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="itskill-add-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Skill / software name<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Skill / software name" name="skill"
                                    class="form-control" maxlength="50" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Software version<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Software version" name="software_version"
                                    class="form-control" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Last used <span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="last_used_software_year" required>
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Experience <span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="software_experience_year">
                                    <option value="0">0 Year</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                    <option value="3">3 Year</option>
                                    <option value="4">4 Year</option>
                                    <option value="5">5 Year</option>
                                    <option value="6">6 Year</option>
                                    <option value="7">7 Year</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">In Month <span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="software_experience_month">
                                    <option value="0">0 Month</option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Month</option>
                                    <option value="3">3 Month</option>
                                    <option value="4">4 Month</option>
                                    <option value="5">5 Month</option>
                                    <option value="6">6 Month</option>
                                    <option value="7">7 Month</option>
                                    <option value="8">8 Month</option>
                                    <option value="9">9 Month</option>
                                    <option value="10">10 Month</option>
                                    <option value="11">11 Month</option>
                                    <option value="12">12 Month</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Edit IT Skills Modal --}}
<div class="modal fade" id="it_skill_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">Edit Your IT Skills</h1>
                    <p class="text-muted modal_pText">Add skills that best define your expertise, for e.g, Direct
                        Marketing, Oracle, Java, etc. (Minimum 1) Skills</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="edit-itskill-form">
                    @csrf
                    <input type="hidden" name="id" id="itskill_id">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Skill / software name<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Skill / software name" name="skill"
                                    class="form-control" maxlength="50" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Software version<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Software version" name="software_version"
                                    class="form-control" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Last used <span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="last_used_software_year">
                                    <option value="2025">2025</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Experience <span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="software_experience_year">
                                    <option value="0">0 Year</option>
                                    <option value="1">1 Year</option>
                                    <option value="2">2 Year</option>
                                    <option value="3">3 Year</option>
                                    <option value="4">4 Year</option>
                                    <option value="5">5 Year</option>
                                    <option value="6">6 Year</option>
                                    <option value="7">7 Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">In Month <span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="software_experience_month">
                                    <option value="0">0 Month</option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Month</option>
                                    <option value="3">3 Month</option>
                                    <option value="4">4 Month</option>
                                    <option value="5">5 Month</option>
                                    <option value="6">6 Month</option>
                                    <option value="7">7 Month</option>
                                    <option value="8">8 Month</option>
                                    <option value="9">9 Month</option>
                                    <option value="10">10 Month</option>
                                    <option value="11">11 Month</option>
                                    <option value="12">12 Month</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="Submit" class="btn btn-primary">Update IT Skill</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- IT Skill Modal End -->

<!-- Employment Modal Start -->
<div class="modal fade" id="employment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">Add Employment</h1>
                    <p class="text-muted modal_pText"> Details like job title, company name, etc, help employers
                        understand your work</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-employment-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="form-label mb-2">Is this your current employment? <span
                                    class="text-danger">*</span></label>
                            <div class="form-group d-flex gap-3 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_current_employment"
                                        id="employmentYes" value="1" checked>
                                    <label class="form-check-label" for="employmentYes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_current_employment"
                                        id="employmentNo" value="0">
                                    <label class="form-check-label" for="employmentNo">No</label>
                                </div>
                            </div>
                        </div>
                        {{-- Employment Type --}}
                        <div class="col-md-12 mb-4">
                            <label class="form-label mb-2">Employment type <span class="text-danger">*</span></label>
                            <div class="form-group d-flex gap-3 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="employment_type"
                                        id="employmentTypeFullTime" value="full_time">
                                    <label class="form-check-label" for="employmentTypeFullTime">Full Time</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="employment_type"
                                        id="employmentTypeInternship" value="intern" checked>
                                    <label class="form-check-label" for="employmentTypeInternship">Internship</label>
                                </div>
                            </div>
                        </div>

                        {{-- Experience --}}
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Total experience <span
                                        class="text-danger">*</span></label>
                                <div class="d-flex gap-2 flex-sm-nowrap">
                                    <select class="form-control selects1" name="experience">
                                        <option disabled>Select Year</option>
                                        <option value="0 Year">0 Year</option>
                                        <option value="1 Year">1 Year</option>
                                        <option value="2 Year">2 Year</option>
                                        <option value="3 Year">3 Year</option>
                                        <option value="4 Year">4 Year</option>
                                        <option value="5 Year">5 Year</option>
                                        <option value="6 Year">6 Year</option>
                                        <option value="7 Year">7 Year</option>
                                        <option value="8 Year">8 Year</option>
                                        <option value="9 Year">9 Year</option>
                                        <option value="10 Year">10 Year</option>
                                    </select>

                                    <select class="form-control selects1" name="experience_month">
                                        <option disabled>Select Month</option>
                                        <option value="0 Month">0 Month</option>
                                        <option value="1 Month">1 Month</option>
                                        <option value="2 Month">2 Month</option>
                                        <option value="3 Month">3 Month</option>
                                        <option value="4 Month">4 Month</option>
                                        <option value="5 Month">5 Month</option>
                                        <option value="6 Month">6 Month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Company Name --}}
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Current company name<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Current company name" name="company_name"
                                    class="form-control typeText" required>
                            </div>
                        </div>
                        {{-- Job Title --}}
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Current job title<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Type your job designation" class="form-control"
                                    name="job_title" maxlength="50" required>
                            </div>
                        </div>
                        {{-- Joining Date --}}
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Joining date<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="joining_date" required>
                            </div>
                        </div>
                        {{-- Current Salary --}}
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Current salary<span
                                        class="text-danger">*</span></label>
                                <input type="number" placeholder="Current salary" name="current_salary"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Notice period<span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="notice_period" required>
                                    <option disabled>Select Notice Period</option>
                                    <option value="15 Days or Less">15 Days or Less</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="2 Month">2 Month</option>
                                    <option value="3 Month">3 Month</option>
                                </select>
                            </div>
                        </div>
                        {{-- Job Profile --}}
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Job profile<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="job_profile" placeholder="Type here..." required></textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Modal Footer --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Employment Modal End -->



<!-- Edit Employment Modal Start -->
<div class="modal fade" id="edit_employment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">Edit Employment</h1>
                    <p class="text-muted modal_pText"> Details like job title, company name, etc, help employers
                        understand your work</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-employment-form">
                    @csrf
                    <input type="hidden" name="id" id="employment_id">
                    <div class="row">
                        {{-- Experience --}}
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Total experience <span
                                        class="text-danger">*</span></label>
                                <div class="d-flex gap-2 flex-sm-nowrap">
                                    <select class="form-control selects1" name="experience">
                                        <option disabled>Select Year</option>
                                        <option value="0 Year">0 Year</option>
                                        <option value="1 Year">1 Year</option>
                                        <option value="2 Year">2 Year</option>
                                        <option value="3 Year">3 Year</option>
                                        <option value="4 Year">4 Year</option>
                                        <option value="5 Year">5 Year</option>
                                        <option value="6 Year">6 Year</option>
                                        <option value="7 Year">7 Year</option>
                                        <option value="8 Year">8 Year</option>
                                        <option value="9 Year">9 Year</option>
                                        <option value="10 Year">10 Year</option>
                                    </select>

                                    <select class="form-control selects1" name="experience_month">
                                        <option disabled>Select Month</option>
                                        <option value="0 Month">0 Month</option>
                                        <option value="1 Month">1 Month</option>
                                        <option value="2 Month">2 Month</option>
                                        <option value="3 Month">3 Month</option>
                                        <option value="4 Month">4 Month</option>
                                        <option value="5 Month">5 Month</option>
                                        <option value="6 Month">6 Month</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Company Name --}}
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Current company name<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Current company name" name="company_name"
                                    class="form-control typeText" required>
                            </div>
                        </div>
                        {{-- Job Title --}}
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Current job title<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Type your job designation" class="form-control"
                                    name="job_title" maxlength="50" required>
                            </div>
                        </div>
                        {{-- Current Salary --}}
                        <div class="col-md-6 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Current salary<span
                                        class="text-danger">*</span></label>
                                <input type="number" placeholder="Current salary" name="current_salary"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Notice period<span class="text-danger">*</span></label>
                                <select class="form-control selects1" name="notice_period" required>
                                    <option disabled>Select Notice Period</option>
                                    <option value="15 Days or Less">15 Days or Less</option>
                                    <option value="1 Month">1 Month</option>
                                    <option value="2 Month">2 Month</option>
                                    <option value="3 Month">3 Month</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Footer --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Edit Employment Modal End -->

<!-- education Modal Start -->
<div class="modal fade" id="education" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">Education</h1>
                    <p class="text-muted modal_pText"> Details like course, university, and more, help recruiters
                        identify your educational background</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="add-education-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Course<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Course Name" name="course"
                                    class="form-control typeText" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">University/Institute<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="University/Institute Name" name="university"
                                    class="form-control" maxlength="120" required>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="form-label mb-2">Course type <span class="text-danger">*</span></label>
                            <div class="form-group d-flex gap-3 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="courseTypeFullTime" value="full_time" required>
                                    <label class="form-check-label" for="courseTypeFullTime">
                                        Full Time
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="courseTypePartTime" checked value="part_time">
                                    <label class="form-check-label" for="courseTypePartTime">
                                        Part Time
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="courseTypeDistance" value="distance">
                                    <label class="form-check-label" for="courseTypeDistance">
                                        Correspondence/Distance learning
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Course duration <span
                                        class="text-danger">*</span></label>
                                <div class="d-flex gap-2">
                                    <select class="form-control selects1" name="start_year">
                                        <option disabled selected class="">Select Ending year</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                    <span><strong class="text-muted p_font">TO</strong></span>
                                    <select class="form-control selects1" name="end_year">
                                        <option disabled selected class="">Select Ending year</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- education Modal End -->

<!-- edit education Modal Start -->
<div class="modal fade" id="edit_Education" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5">Edit Education</h1>
                    <p class="text-muted modal_pText"> Details like course, university, and more, help recruiters
                        identify your educational background</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="edit-education-form">
                    @csrf
                    <input type="hidden" name="id" id="education_id">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">Course<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Course Name" name="course"
                                    class="form-control typeText" value="" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="form-group">
                                <label class="form-label mb-0">University/Institute<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="University/Institute Name" name="university"
                                    class="form-control" maxlength="120" required>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">

                            <label class="form-label mb-2">Course type <span class="text-danger">*</span></label>
                            <div class="form-group d-flex gap-3 flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="courseTypeFullTime" value="full_time">
                                    <label class="form-check-label" for="courseTypeFullTime">
                                        Full Time
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="courseTypePartTime" value="part_time" checked>
                                    <label class="form-check-label" for="courseTypePartTime">
                                        Part Time
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="courseTypeDistance" value="distance">
                                    <label class="form-check-label" for="courseTypeDistance">
                                        Correspondence/Distance learning
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Course duration <span
                                        class="text-danger">*</span></label>
                                <div class="d-flex gap-2">
                                    <select class="form-control selects1" name="start_year">
                                        <option disabled selected>Select starting year</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                    <span><strong class="text-muted p_font">TO</strong></span>
                                    <select class="form-control selects1" name="end_year">
                                        <option disabled selected class="">Select Ending year</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--edit education Modal End -->

<!--- add Profile summary start-->
<div class="modal fade" id="profile_summry" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Profile summary</h1>
                    <p class="text-muted modal_pText">Give recruiters a brief overview of the highlights of your
                        career, key achievements, and career goals to help recruiters know your profile better</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="add-profile-summary">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Add Profile summary<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" placeholder="add profile summary.." name="profile_summary" required></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--- add Profile summary end-->

{{-- Edit Profile Summary Start  --}}
<div class="modal fade" id="add_profile_summry" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile summary</h1>
                    <p class="text-muted modal_pText">Give recruiters a brief overview of the highlights of your
                        career, key achievements, and career goals to help recruiters know your profile better</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="edit-profile-summary">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Update Profile summary<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" placeholder="add profile summary.." name="profile_summary" required>
                                    {{ optional($candidate)->profile_summary }}
                                </textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Profile Summary</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- Edit Profile Summary End  --}}

<!--- personal details start-->
<div class="modal fade" id="personal_details" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Personal
                        details</h1>
                    <p class="text-muted modal_pText">This information is important for
                        employers to know you better</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="add-personal-details">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-2 ">Have you taken a career
                                    break?<span class="text-danger">*</span></label>

                                <div class="form-group d-flex gap-3 flex-wrap">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="career_break"
                                            value="Yes" id="career_yes">
                                        <label class="form-check-label" for="career_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="career_break"
                                            value="No" id="career_no" checked>
                                        <label class="form-check-label" for="career_no">
                                            No
                                        </label>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Date of birth<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="date_of_birth" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Marital Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="marital_status" required>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group select2form">
                                <label class="text-dark">Language proficiency</label>
                                <select class="select2 form-control block" name="language[]" multiple="multiple"
                                    style="width: 100%">
                                    <option value="Hindi">Hindi</option>
                                    <option value="English">English</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Permanent address<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Permanent address" name="permanent_address"
                                    class="form-control" maxlength="60" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Hometown<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Hometown" name="hometown"
                                    class="form-control typeText " required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Pincode<span class="text-danger">*</span></label>
                                <input type="number" placeholder="Pincode" name="pincode"
                                    class="form-control typeNumber" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Personal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--- personal details end-->

{{-- Edit Personal Deatils Start  --}}
<div class="modal fade" id="edit_personal_details" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Personal
                        details</h1>
                    <p class="text-muted modal_pText">This information is important for
                        employers to know you better</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="edit-personal-details">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-2 ">Have you taken a career
                                    break?<span class="text-danger">*</span></label>

                                <div class="form-group d-flex gap-3 flex-wrap">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="career_break"
                                            id="careerYes" value="Yes"
                                            {{ old('career_break', optional($candidate)->career_break) == 'Yes' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="careerYes">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="career_break"
                                            id="careerNo" value="No"
                                            {{ old('career_break', optional($candidate)->career_break) == 'No' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="careerNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            {{-- <div class="form-group">
                                <label class="form-label mb-0">Date of birth<span
                                        class="text-danger">*</span></label>
                                <input type="date" name="date_of_birth"
                                    value="{{ $candidate->date_of_birth ? \Carbon\Carbon::parse($candidate->date_of_birth)->format('Y-m-d') : '' }}"
                                    class="form-control" required>
                            </div> --}}
                            <div class="form-group">
                                <label class="form-label mb-0">Date of birth <span
                                        class="text-danger">*</span></label>
                                <input type="date" name="date_of_birth"
                                    value="{{ old('date_of_birth', optional($candidate)->date_of_birth ? \Carbon\Carbon::parse(optional($candidate)->date_of_birth)->format('Y-m-d') : '') }}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Marital Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-control selects1" name="marital_status" required>
                                    <option value="single"
                                        {{ optional($candidate)->marital_status == 'single' ? 'selected' : '' }}>
                                        Single
                                    </option>
                                    <option value="married"
                                        {{ optional($candidate)->marital_status == 'married' ? 'selected' : '' }}>
                                        Married
                                    </option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 mb-4">
                            <div class="form-group select2form">
                                <label class="text-dark">Language proficiency</label>
                                @php
                                    $candidateLanguages = is_array($candidate->language)
                                        ? $candidate->language
                                        : explode(',', $candidate->language);
                                @endphp

                                <select class="select2 form-control block" name="language[]" multiple="multiple"
                                    style="width: 100%">
                                    <option value="Hindi"
                                        {{ in_array('Hindi', $candidateLanguages) ? 'selected' : '' }}>Hindi</option>
                                    <option value="English"
                                        {{ in_array('English', $candidateLanguages) ? 'selected' : '' }}>English
                                    </option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-6 mb-4">
                            <div class="form-group select2form">
                                <label class="text-dark">Language proficiency</label>
                                @php
                                    $candidateLanguageRaw = old('language', optional($candidate)->language);
                                    $candidateLanguages = is_array($candidateLanguageRaw)
                                        ? $candidateLanguageRaw
                                        : explode(',', $candidateLanguageRaw ?? '');
                                @endphp

                                <select class="select2 form-control block" name="language[]" multiple="multiple"
                                    style="width: 100%">
                                    <option value="Hindi"
                                        {{ in_array('Hindi', $candidateLanguages) ? 'selected' : '' }}>Hindi</option>
                                    <option value="English"
                                        {{ in_array('English', $candidateLanguages) ? 'selected' : '' }}>English
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Permanent address<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="Permanent address" name="permanent_address"
                                    class="form-control" maxlength="60"
                                    value="{{ old('permanent_address', optional($candidate)->permanent_address) }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Hometown<span class="text-danger">*</span></label>
                                <input type="text" placeholder="Hometown" name="hometown"
                                    class="form-control typeText"
                                    value="{{ old('hometown', optional($candidate)->hometown) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label mb-0">Pincode<span class="text-danger">*</span></label>
                                <input type="number" placeholder="Pincode" name="pincode"
                                    class="form-control typeNumber"
                                    value="{{ old('pincode', optional($candidate)->pincode) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Personal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Edit Personal Deatils End  --}}
</main>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>
<!--- select 2-->
{{-- <script src="assets/select2/select2.full.min.js"></script>
 <script src="assets/select2/select2.init.js"></script>
 <script src="assets/select2/select2.min.js"></script> --}}

<script src="{{ asset('assets/frontend/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/frontend/select2/select2.init.js') }}"></script>
<script src="{{ asset('assets/frontend/select2/select2.min.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<!--- sweet alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/frontend/script/script.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.profiels').slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('.view_all_job').slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }]
        });
    });
</script>

{{-- <script>
  $(document).ready(function () {
    $('#search_job').on('input', function () {
      let value = $(this).val();
      $(this).val(value.replace(/[^a-zA-Z0-9 ]/g, ''));
    });
  });
</script> --}}

<script>
    $(document).ready(function() {
        $('#search_job').on('input', function() {
            let value = $(this).val();
            $(this).val(value.replace(/[^a-zA-Z0-9 ]/g, ''));
        });

        // profile image upload
        console.log($('#set_profile_image'));
    });
</script>


<script>
    //  $('.select2').select2({
    //      dropdownParent: $('#skill_add'),
    // });


    $('.select2').select2({
        dropdownParent: $('#skill_add'),
    });

    $('.select2').select2({
        dropdownParent: $('#personal_details'),
    });

    $('.select2').select2({
        dropdownParent: $('#edit_personal_details'),
    });

    $('.skill-select').select2({
        dropdownParent: $('#skill_add')
    });

    $('.personal-select').select2({
        dropdownParent: $('#personal_details')
    });

    $(document).ready(function() {
        $('#delete_skill').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't to delete this skill!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your skill has been deleted.",
                        icon: "success"
                    });
                }
            });
        })
    })

    $(document).ready(function() {
        $('#apply_job').on('click', function() {
            Swal.fire("Apply successfull");
            $(this).prop("disabled", true);
        });

        $('#save_job').on('click', function() {
            Swal.fire({
                title: "Do you want to save this job?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {

                if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        })

    });
</script>
<script>
    $(document).ready(function() {
        $('#year-select').select2();
    });
</script>

<script>
    $(document).ready(function() {
        $('#resume-upload').on('change', function() {
            let fileInput = this.files[0];

            if (!fileInput) {
                $('#file_name').html('<small>No file selected.</small>');
                return;
            }

            const fileSizeMB = (fileInput.size / (1024 * 1024)).toFixed(2);
            if (fileInput.size > 2 * 1024 * 1024) {
                $('#file_name').html(`
                    <div class="text-danger"><small>File size (${fileSizeMB} MB) exceeds 2 MB limit.</small></div>
                `);
                this.value = '';
                return;
            }

            $('#file_name').html(`
                <div class="file-item d-flex align-items-center justify-content-between border p-2 mb-2 rounded">
                    <div>
                        <strong>${fileInput.name}</strong> <small>(${fileSizeMB} MB)</small>
                    </div>
                </div>
            `);

            let formData = new FormData();
            formData.append('candidate_resume', fileInput);

            $.ajax({
                url: '{{ route('resume.upload') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.message);
                        $('#file_name').append(
                            `<div><a href="${response.file_path}" target="_blank">View Resume</a></div>`
                        );
                    } else {
                        alert('Upload failed: ' + response.message);
                    }
                },
                error: function(xhr) {
                    let errorMsg = xhr.responseJSON?.message || 'An error occurred.';
                    alert(errorMsg);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#upload_profile_img').on('change', function() {
            let file = this.files[0];
            if (!file) return;

            const fileSizeMB = (file.size / (1024 * 1024)).toFixed(2);
            if (file.size > 10 * 1024 * 1024) {
                alert(`File size (${fileSizeMB} MB) exceeds 10 MB limit.`);
                $(this).val('');
                return;
            }

            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                alert("Only JPG, JPEG, PNG images are allowed.");
                $(this).val('');
                return;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profile_image').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
            let form = $('#profileImageUploadForm')[0];
            let formData = new FormData(form);

            $.ajax({
                url: '{{ route('profile.image.upload') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.message);
                        $('#profile_image').attr('src', response.image_url);
                    } else {
                        alert("Upload failed: " + response.message);
                    }
                },
                error: function(xhr) {
                    let msg = xhr.responseJSON?.message || 'An error occurred.';
                    alert(msg);
                }
            });
        });
    });
</script>

@yield('user_profile_modal')

@yield('non-avation')
</body>

</html>
