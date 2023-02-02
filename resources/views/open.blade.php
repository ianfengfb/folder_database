<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Folders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/css/index.css?v=').time()}}">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
    {{-- Add new folder Modal --}}
<div class="modal fade" id="AddFolderModal" tabindex="-1" aria-labelledby="AddFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b> Create new Folder</b></h5>
                <button type="button" data-bs-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/folders">
                    @csrf
                    <input type="hidden" name="folder_id"  value="{{$folder_id}}">
                    <div class="mb-6">
                      <label for="folderName" class="inline-block text-lg mb-2">Folder Name</label>
                      <input type="text" class="border border-gray-200 rounded p-2 w-full" name="folderName"
                        value="{{old('folderName')}}" required/>
              
                      @error('folderName')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                      @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button class="bg-rose-600 text-white rounded py-2 px-4 hover:bg-rose-900">Create Folder</button>
            </form>
                <button class="bg-blue-600 text-white rounded py-2 px-4 hover:bg-blue-900"  data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
  </div>
    <div class="page_container">

        <div class="title_container">
            <h5 class="page_title font-bold mb-3 pt-3">Your Folders</h5>
        </div>
        <div class="hr_container">
            <hr />
        </div>
        <div class="nav_container mt-2">
            @foreach ($parent_folders as $k => $val)
            <span class="rounded py-2 px-1 text-lg hover:bg-disable no_dropdown">
                <a href="/open/{{$k}}">{{$val}}<i class="fa-solid fa-chevron-right ms-2"></i></a>
            </span>
            @endforeach
            <span class="dropdown actions">
                <span class="rounded py-2 px-1 text-lg hover:bg-disable dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{$current_folder}}
                </span>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AddFolderModal"><i class="fa-solid fa-folder me-3"></i>New Folder</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AddNoteModal"><i class="fa-solid fa-arrow-up-right-from-square me-3"></i>Share Folder</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#AddNoteModal"><i class="fa-solid fa-user-group me-3"></i>Share in group</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item hover:bg-oliphant" href="#" data-bs-toggle="modal" data-bs-target="#DeleteFolderModal"><i class="fa-solid fa-trash me-3"></i>Delete</a></li>
                </ul>
            </span>
        </div>
        <div class="folder_section_container">
            <x-card class="mt-3">
                <div class="container">
                    <div class="row">
                        @foreach ($folders as $folder)
                        <div class="col-3">
                        <a href="/open/{{$folder->id}}">
                            <div class="folder_card text-center">
                                <i class="fa-solid fa-folder-closed fa-5x text-sky-500"></i>
                                <p class="text-3xl">{{$folder->folder_name}}</p>
                            </div>
                        </a>
                        </div>
                        @endforeach
                        <div class="col-3">
                            <div class="folder_card text-center" data-bs-toggle="modal"
                            data-bs-target="#AddFolderModal">
                                <i class="fa-solid fa-folder-plus fa-5x text-sky-500"></i>
                                <p class="text-3xl">New Folder</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>