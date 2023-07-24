@extends('admin.layouts.master')

@section('title')
    الاكواد
@endsection

@section('css')
@endsection

@section('title-one')
    الاكواد
@endsection

@section('title-two')
    الاكواد
@endsection


@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">توليد الاكواد</h3>
                </div>
                <div class="card-body">


                    <form action="{{ route('admin.codes.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">الصف الدراسي</label>
                                <div class="col-md-9">
                                    <select name="level_id" class="form-control form-control select2"
                                        data-bs-placeholder="Select Country" tabindex="-1" aria-hidden="true">
                                        <option value="">اختر المستوي</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('level_id'))
                                        <span class="text-danger">{{ $errors->first('level_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label">عدد الأكواد</label>
                                <div class="col-md-9">
                                    <input type="number" name="count" class="form-control" id="num-codes-input"
                                        min="1" max="100">
                                    @if ($errors->has('count'))
                                        <span class="text-danger">{{ $errors->first('count') }}</span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger p-2">توليد</button>

                        </div>
                    </form>

                    <div class="row mb-4">
                        <div class="col-md-9">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الكود</th>
                                        <th>الصف الدراسي</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody id="code-table-body">
                                    @foreach ($codes as $code)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $code->code }}</td>
                                            <td>{{ $code->level->name }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-12 col-md-auto">
                                                        <form action="{{ route('admin.codes.destroy', $code->id) }}"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" data-toggle="tooltip"
                                                                data-original-title="Delete"
                                                                class="delete btn btn-danger btn-sm deletePost">حذف</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $codes->links() }}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <!--Row-->
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('admin.codes.index') }}" class="btn btn-primary p-2">الغاء والرجوع
                                للرئيسية</a>
                        </div>
                        <div class="col-md-6 text-end">

                            <a id="export-excel-button" class="col-md-3 btn btn-success p-2 ms-2" role="button"
                                type="button">تصدير إلى Excel</a>

                        </div>
                    </div>
                    <!--End Row-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script type="text/javascript">
        function exportToExcel() {
            const table = document.getElementById('code-table-body');
            const rows = table.getElementsByTagName('tr');
            const data = [];

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const rowData = [];
                const cells = row.getElementsByTagName('td');

                for (let j = 0; j < cells.length; j++) {
                    const cell = cells[j];
                    rowData.push(cell.textContent);
                }

                data.push(rowData);
            }

            const worksheet = XLSX.utils.aoa_to_sheet(data);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Codes');
            const excelBuffer = XLSX.write(workbook, {
                bookType: 'xlsx',
                type: 'array'
            });
            const blob = new Blob([excelBuffer], {
                type: 'application/octet-stream'
            });
            const fileName = `codes_${new Date().toISOString().slice(0, 10)}.xlsx`;

            if (navigator.msSaveBlob) {
                // For IE 10 and above
                navigator.msSaveBlob(blob, fileName);
            } else {
                // For other browsers
                const downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(blob);
                downloadLink.download = fileName;
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            }
        }

        // Event listener for the export button
        document.getElementById('export-excel-button').addEventListener('click', exportToExcel);
    </script>
@endsection
