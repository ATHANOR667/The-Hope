<div class="container">
    <div class="row">

        <div class="col-lg-6 col-12">
            <h2 class="mb-5">A propos de nous </h2>
        </div>

        <div class="col-lg-4 col-12 ms-lg-auto mb-5 mb-lg-0">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-intro-tab" data-bs-toggle="tab" data-bs-target="#nav-intro" type="button" role="tab" aria-controls="nav-intro" aria-selected="true">Objectifs</button>

                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profils</button>

                    <button class="nav-link" id="nav-faq-tab" data-bs-toggle="tab" data-bs-target="#nav-faq" type="button" role="tab" aria-controls="nav-faq" aria-selected="false">FAQs</button>

                    <button class="nav-link" id="nav-histoire-tab" data-bs-toggle="tab" data-bs-target="#nav-histoire" type="button" role="tab" aria-controls="nav-histoire" aria-selected="false">Histoire</button>

                </div>
            </nav>
        </div>

        <div class="col-12">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-intro" role="tabpanel" aria-labelledby="nav-intro-tab">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-lg-0 mb-4">
                            <img src="{{asset('images/work/img2.jpg')}}" class="img-fluid" alt="">
                        </div>

                        <div class="col-lg-5 col-12 m-auto">
                            <h3 class="mb-3">Le partage</h3>

                            <p class="quote">« Le contraire de la misère ce n'est pas la richesse. Le contraire de la misère, c'est le partage. »</p>
                            <p><strong>- Abbé Pierre</strong></p>

                            <p>Le partage étant la valeur fondamentale qui peut avoir un impact positif sur les communautés et les individus, il est donc l’objectif principal. C’est ainsi que <strong>THE HOPE</strong> agira sur :</p>

                            <p><strong>Partage de ressources :</strong> partager des biens, des services, des connaissances pour aider les enfants orphelins, sans-abris, vulnérables.</p>
                            <p><strong>Partage d’expériences :</strong> partager des histoires, des expériences pour inspirer et motiver ces enfants, en leur faisant comprendre que tout est possible dans la vie dès lors qu’on y croit et qu’on se donne les moyens pour.</p>
                            <p><strong>Partage des compétences :</strong> partager des compétences, des connaissances pour aider ces enfants à développer leurs capacités.</p>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div id="profileCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Profil 1 -->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                                        <img src="{{asset('images/work/img.jpg')}}" class="img-fluid rounded-3 shadow" alt="Carine Silastsa">
                                    </div>
                                    <div class="col-lg-5 col-12 m-auto">
                                        <h3 class="mb-3">Carine Silastsa, CEO</h3>
                                        <p>Nous avons à cœur de soutenir les jeunes de notre communauté.</p>
                                        <ul class="social-icon mt-lg-5 mt-3">
                                            <li class="me-3"><strong>Ou me trouver ?</strong></li>
                                            <li><a href="https://www.facebook.com/share/1DEMZucC1K/?mibextid=wwXIfr" class="social-icon-link bi-facebook fs-5"></a></li>
                                            <li><a href="https://www.linkedin.com/in/carine-silatsa-b29144320/" class="social-icon-link bi-linkedin fs-5"></a></li>
                                            <li><a href="https://www.instagram.com/silatsacarine23/" class="social-icon-link bi-instagram fs-5"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Profil 2 -->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                                        <img src="{{asset('images/work/profile2.jpg')}}" class="img-fluid rounded-3 shadow" alt="Jean Dupont">
                                    </div>
                                    <div class="col-lg-5 col-12 m-auto">
                                        <h3 class="mb-3">Wylliam Wanang, Ambassadeur</h3>
                                        <p>Il y a plus de plaisir à donner qu'à recevoir. Et la réussite qu'importe notre condition de base, devrait etre accessible à tous.</p>
                                        <ul class="social-icon mt-lg-5 mt-3">
                                            <li class="me-3"><strong>Réseaux sociaux</strong></li>
                                            <li><a href="#" class="social-icon-link bi-facebook fs-5"></a></li>
                                            </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Profil 3 -->
                            {{--<div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                                        <img src="{{asset('images/work/profile3.jpg')}}" class="img-fluid rounded-3 shadow" alt="Marie Curie">
                                    </div>
                                    <div class="col-lg-5 col-12 m-auto">
                                        <h3 class="mb-3"> TAFEN Charles, Educateur</h3>
                                        <p>Spécialiste en éducation et formation des jeunes.</p>
                                        <ul class="social-icon mt-lg-5 mt-3">
                                            <li class="me-3"><strong>Contact</strong></li>
                                            <li><a href="#" class="social-icon-link bi-facebook fs-5"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>--}}
                        </div>

                        <!-- Contrôles de navigation améliorés -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#profileCarousel" data-bs-slide="prev" style="width: 5%;">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true" style="background-color: rgba(0,0,0,0.3) !important;"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#profileCarousel" data-bs-slide="next" style="width: 5%;">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true" style="background-color: rgba(0,0,0,0.3) !important;"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>

                        <!-- Indicateurs centrés et visibles -->
                        <div class="carousel-indicators mt-4 mb-0">
                            <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="0" class="active mx-2" style="width: 12px; height: 12px; border-radius: 50%;"></button>
                            <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="1" class="mx-2" style="width: 12px; height: 12px; border-radius: 50%;"></button>
{{--
                            <button type="button" data-bs-target="#profileCarousel" data-bs-slide-to="2" class="mx-2" style="width: 12px; height: 12px; border-radius: 50%;"></button>
--}}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-faq" role="tabpanel" aria-labelledby="nav-faq-tab">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-lg-0 mb-4">
                            <img src="{{asset('images/work/logoInitial.jpg')}}" class="img-fluid" alt="">
                        </div>

                        <div class="col-lg-5 col-12 m-auto">
                            <h3 class="mb-3">Questions fréquentes </h3>

                            <div class="accordion" id="accordionGeneral">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralOne" aria-expanded="true" aria-controls="accordionGeneralOne">
                                            HOPE c'est quoi ?
                                        </button>
                                    </h2>

                                    <div id="accordionGeneralOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionGeneral">
                                        <div class="accordion-body">
                                            <p class="large-paragraph"><strong>HOPE</strong> est une initiative des jeunes pour les jeunes et par les jeunes</p>
                                            <p class="large-paragraph">Nous nous déployons à offrir des repas, des activités récréatives et exploitons notre hub pour offrir des opportunitées professionelles</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralTwo" aria-expanded="false" aria-controls="accordionGeneralTwo">
                                            Comment contribuer?
                                        </button>
                                    </h2>

                                    <div id="accordionGeneralTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionGeneral">
                                        <div class="accordion-body">
                                            <p class="large-paragraph"><a href="#section_4">Vous pouvez à tout moment faire des  dons qui seront mis à contribution de causes nobles.</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordionGeneralThree" aria-expanded="false" aria-controls="accordionGeneralThree">
                                            Si je n'ai pas d'argent ?
                                        </button>
                                    </h2>

                                    <div id="accordionGeneralThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionGeneral">
                                        <div class="accordion-body">
                                            <p class="large-paragraph"><a href="#section_5">Vous pouvez aider grâce à votre expertise dans votre domaine de compétence et par votre disponibilité. Une paire de main n'est jamais de trop</a> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-histoire" role="tabpanel" aria-labelledby="nav-histoire-tab">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-lg-0 mb-4">
                            <img src="{{asset('images/realisations/logoNew.png')}}" class="img-fluid" alt="Histoire">
                        </div>

                        <div class="col-lg-5 col-12 m-auto">
                            <h3 class="mb-3">Notre Histoire</h3>
                            <p>Ce projet naît de l’envie des jeunes hommes et femmes courageux, battants et surtout travailleurs venant pour la plupart de pays, de cultures, voire même de continents différents, mais partageant tous cette même vision : celle de voir le monde devenir un endroit meilleur. Michael Jackson a chanté : "Guérissons le monde, faisons de lui un endroit meilleur, pour nous et pour vous, ainsi que pour toute la race humaine."</p>
                            <p>C’est ainsi que ceux-ci ont décidé de devenir pour tous ces enfants orphelins, vulnérables, et sans-abris un facteur chance. Et bien, c’est quoi le facteur chance ? C’est tout simplement être ces personnes-là qui vont non seulement redonner de l’espoir à tous ces enfants, mais aussi et surtout remettre du sourire sur tous ces visages qui se sont assombris entre-temps.</p>
                            <p><strong>SILATSA Carine</strong>, la fondatrice, <strong>WANANG Junior</strong> et <strong>TAFEN Charles</strong>, les co-fondateurs de cette association, sont d’ailleurs eux aussi des exemples purs du "facteur chance", car venant d’un milieu et d’une famille assez modeste, elle a pu expérimenter ce facteur chance grâce à des personnes incroyables qu’elle a rencontrées dans sa vie. Aujourd’hui, icône du basketball camerounais et européen, elle a pour mission de donner la même chance qu’elle a pu recevoir à tous ces jeunes dans le monde.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
