<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pengumuman Terbaru
                </h6>
                @foreach($pengumuman as $p)
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$p->created_at->diffForHumans()}}</div>
                    <span class="font-weight-bold">{{Str::limit(strip_tags($p->judul_pengumuman),100,'...')}}</span>
                  </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>