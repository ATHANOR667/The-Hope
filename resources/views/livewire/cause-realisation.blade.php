<div class="col-md-6 mb-4">
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-4">

            <h4>Réalisation</h4>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body">

                    <!-- Lien vidéo -->
                    <div class="mb-4">
                        <label for="cause.videoPostRealisation" class="form-label">Lien vidéo (URL)</label>
                        <input type="url" class="form-control" id="cause.videoPostRealisation" wire:model="videoLink" placeholder="https://www.youtube.com/...">
                        @error('videoLink') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="cause.imagePostRealisation" class="form-label">Télécharger une image</label>
                        <input type="file" class="form-control" id="cause.imagePostRealisation" wire:model="imageUpload" accept="image/*">
                        @error('imageUpload') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!-- Prévisualisation de l'image téléchargée -->
                    <div class="mt-3 d-flex">
                        <div class="me-3">
                            <p><strong>Prévisualisation de l'image :</strong></p>
                            @if ($imageUpload)
                                <img src="{{ $imageUpload->temporaryUrl() }}" width="100" height="100" class="img-thumbnail" alt="Image prévisualisée" />
                            @else
                                <p>Aucune image sélectionnée.</p>
                            @endif
                        </div>

                        <div class="me-3">
                            <p><strong>Image actuelle :</strong></p>
                            @if ($cause->imagePostRealisation)
                                <a href="{{ asset('storage/' . $cause->imagePostRealisation) }}" target="_blank" class="btn btn-info btn-sm">
                                    <img src="{{ asset('storage/' . $cause->imagePostRealisation) }}" width="100" height="100" class="img-thumbnail" alt="Image actuelle" />
                                </a>
                                @if($cause->deleted_at == null)
                                    <button wire:click="deleteImage" class="btn btn-danger btn-sm mt-2">Supprimer l'image</button>
                                @endif
                            @else
                                <p>Aucune image enregistrée.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Vidéo actuelle -->
                    <div class="mt-3">
                        <p><strong>Vidéo actuelle :</strong></p>
                        @if ($cause->videoPostRealisation)
                            <!-- Bouton pour afficher le popup -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal" class="btn btn-info btn-sm w-50">Voir la vidéo</a>
                            @if($cause->deleted_at == null)
                                <button wire:click="deleteVideo" class="btn btn-danger btn-sm mt-2 w-50">Supprimer la vidéo</button>
                            @endif
                        @else
                            <p>Aucune vidéo enregistrée.</p>
                        @endif
                    </div>


                    <button type="button" wire:click="save" class="btn btn-primary mt-3">Soumettre</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal vidéo pour afficher le lien dans un popup -->
    @if ($cause->videoPostRealisation)
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel">Vidéo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <iframe id="youtubeVideo" width="100%" height="400" src="{{ $cause->videoPostRealisation }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const videoModal = document.getElementById('videoModal');
                const iframe = document.getElementById('youtubeVideo');

                videoModal.addEventListener('hidden.bs.modal', function () {
                    iframe.src = '';
                });

                videoModal.addEventListener('show.bs.modal', function () {
                    iframe.src = "{{ $cause->videoPostRealisation }}";
                });
            });
        </script>
    @endif
</div>
