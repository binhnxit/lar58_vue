<template>
    <div>
        <!-- Basic tables title -->
        <div class="mb-3">
            <h6 class="mb-0 font-weight-semibold">
                Hello world
            </h6>
            <span class="text-muted d-block">Tables with default <code>Bootstrap</code> styling</span>
        </div>
        <!-- /basic tables title -->


        <b-card>
            <template #title>
                Basic example
            </template>
            <template #action>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </template>
            <template #description>
                Example of a <code>basic</code> table. For basic styling (light padding and only horizontal
                dividers) add the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem
                super redundant, but given the widespread use of tables for other plugins like calendars and
                date pickers, we've opted to isolate our custom table styles.
            </template>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Eugene</td>
                        <td>Kopyov</td>
                        <td>@Kopyov</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Victoria</td>
                        <td>Baker</td>
                        <td>@Vicky</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>James</td>
                        <td>Alexander</td>
                        <td>@Alex</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Franklin</td>
                        <td>Morrison</td>
                        <td>@Frank</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </b-card>
    </div>
</template>

<script>
  export default {
    data() {
      return {}
    },
    methods: {}
  }
</script>
