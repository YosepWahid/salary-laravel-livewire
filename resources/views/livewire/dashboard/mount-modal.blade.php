<div class="row">
    <div class="col-md-3">
        <div class="card p-3">
            <section class="d-flex justify-content-around">
                <div>
                    <span class="iconify" data-icon="uil:user" style="font-size: 3rem"></span>
                </div>

                <div>
                    <h4>Total People</h4>
                    <span class="text-muted">{{ $count_user }} User</span>
                </div>
            </section>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3">
            <section class="d-flex justify-content-around">
                <div>
                    <span class="iconify" data-icon="uil:user-check" style="font-size: 3rem"></span>
                </div>

                <div>
                    <h4>With Roles</h4>
                    <span class="text-muted">{{ $user_with_roles }} User</span>
                </div>
            </section>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3">
            <section class="d-flex justify-content-around">
                <div>
                    <span class="iconify" data-icon="uil:user-times" style="font-size: 3rem"></span>
                </div>

                <div>
                    <h4>Without Roles</h4>
                    <span class="text-muted">{{ $user_without_roles }} User</span>
                </div>
            </section>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card py-3 px-2">
            <section class="d-flex justify-content-evenly">
                <div>
                    <span class="iconify" data-icon="bx:money-withdraw" style="font-size: 3rem"></span>
                </div>

                <div>
                    <h4>Total Salary ({{ $year }})</h4>
                    <span class="text-muted">Rp {{ $total_salary }}</span>
                </div>
            </section>
        </div>
    </div>

</div>
