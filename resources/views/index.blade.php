@extends('layouts_page.app')

@section('title', 'Página Principal')

@section('content')

      <!-- home section -->
      <section class="home bg-light" id="home">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="images/aleph-icon-rbg.png" alt="" class="img-fluid mb-4 smallphone-image">
                    <h1>Educación innovadora</h1>
                    <h3 >para las soluciones del mañana.</h3>
                    <!--<p class="mt-4 text-muted">Nuestra metodología educativa está alineada con las neurociencias y los últimos estudios sobre el aprendizaje efectivo y significativo.</p>
                    <button class="btn bg-gradiant mt-4" href="#contact">Ver mas</button>-->
                    <a class="btn bg-gradiant mt-4" href="#contact">Ver más</a>
                </div>



                <div class="col-lg-5 offset-md-1 ">
                    <img src="images/img-aleph.jpeg" alt="" class="img-fluid">
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

        <div class="background-line"></div>
    </section>
    <!-- end home section -->

    <!-- contact section -->
    <section class="section contact overflow-hidden" id="contact">
        <!-- start container -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="title text-center mb-5">
                        <!--<h6 class="mb-0 fw-bold text-primary">Contact Us</h6>-->
                        <h2 class="f-40">SOLICITUD DE BECA PARA EL PERÍODO ACADÉMICO 2025!</h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-center ">
                <div class="col-md-12 mb-4">
                    <div class="container mt-5">
                        <div class="stepper-wrapper">
                            <div class="stepper-item active">
                                <div class="step-counter">1</div>
                                <div class="step-label">Inicio</div>
                            </div>
                            <div class="stepper-item">
                                <div class="step-counter">2</div>
                                <div class="step-label">Estudiante</div>
                            </div>
                            <div class="stepper-item">
                                <div class="step-counter">3</div>
                                <div class="step-label">Progenitor 1</div>
                            </div>
                            <div class="stepper-item">
                                <div class="step-counter">4</div>
                                <div class="step-label">Progenitor 2</div>
                            </div>
                            <div class="stepper-item">
                                <div class="step-counter">5</div>
                                <div class="step-label">Situación Económica</div>
                            </div>
                            <div class="stepper-item">
                                <div class="step-counter">6</div>
                                <div class="step-label">General</div>
                            </div>
                        </div>

                        <div class="form mt-4">
                             <!-- Paso 1: Inicio -->
                            <div class="form-step d-block" data-step="1">
                                @include('paso1')
                            </div>
                            <!-- Paso 2: Estudiante -->
                            <div class="form-step d-none" data-step="2">
                                @include('paso2')
                            </div>
                            <!-- Paso 3: Progenitor 1 -->
                            <div class="form-step d-none" data-step="3">
                                @include('paso3')
                            </div>
                            <!-- Paso 4: Progenitor 2 -->
                            <div class="form-step d-none" data-step="4" id="step-progenitor-2">
                                @include('paso4')
                            </div>
                            <!-- Paso 5: Situación Económica -->
                            <div class="form-step d-none" data-step="5">
                                @include('paso5')
                            </div>
                            <!-- Paso 6: General -->
                            <div class="form-step d-none" data-step="6">
                                @include('paso6')
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button id="prev-btn" class="btn btn-secondary" type="button" disabled>← Anterior</button>
                                <button id="next-btn" class="btn btn-primary" type="button">Siguiente →</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$('input[type="text"]').on('input', function () {
        $(this).val($(this).val().toUpperCase());
    });

	function toggleVisibility(triggerSelector, targetSelector, condition) {
        $(triggerSelector).on('change', function () {
            $(targetSelector).toggleClass('d-none', !condition($(this)));
        });
    }

    toggleVisibility('#trabajoSi', '#trabajoRemuneradoCampos', () => true);
    toggleVisibility('#trabajoNo', '#trabajoRemuneradoCampos', () => false);
    toggleVisibility('#trabajoNo', '#desempleoCampos', () => true);
    toggleVisibility('#trabajoSi', '#desempleoCampos', () => false);

    toggleVisibility('#bonosSi', '#bonosMonto', () => true);
    toggleVisibility('#bonosNo', '#bonosMonto', () => false);

    toggleVisibility('#utilidadesSi', '#utilidadesMonto', () => true);
    toggleVisibility('#utilidadesNo', '#utilidadesMonto', () => false);

    toggleVisibility('#titularSi', '#titularCampos', () => true);
    toggleVisibility('#titularNo', '#titularCampos', () => false);

    toggleVisibility('#inmuebleSi', '#inmueblesDetalles', () => true);
    toggleVisibility('#inmuebleNo', '#inmueblesDetalles', () => false);

    $('#tipoDocumento').on('change', function () {
        const $nroDocumento = $('#nroDocumento');
        const tipo = $(this).val();

        $nroDocumento.val('').removeAttr('maxlength minlength pattern placeholder');

        switch (tipo) {
            case 'DNI':
                $nroDocumento.attr({
                    maxlength: 8,
                    minlength: 8,
                    pattern: '\\d{8}',
                    placeholder: 'Debe tener 8 dígitos'
                });
                break;
            case 'Pasaporte':
                $nroDocumento.attr({
                    maxlength: 12,
                    pattern: '[a-zA-Z0-9]{1,12}',
                    placeholder: 'Máximo 12 caracteres alfanuméricos'
                });
                break;
            case 'Carnet de Extranjería':
                $nroDocumento.attr({
                    maxlength: 9,
                    minlength: 9,
                    pattern: '\\d{9}',
                    placeholder: 'Debe tener 9 dígitos'
                });
                break;
        }
    });

    $('#nroDocumento').on('input', function () {
        const tipo = $('#tipoDocumento').val();
        const value = $(this).val();

        switch (tipo) {
            case 'DNI':
            case 'Carnet de Extranjería':
                $(this).val(value.replace(/[^0-9]/g, ''));
                break;
            case 'Pasaporte':
                $(this).val(value.replace(/[^a-zA-Z0-9]/g, ''));
                break;
        }
    });
</script>

<script>
    $(document).ready(function() {

        let currentStep = 1;

        // Función para actualizar la visibilidad de los pasos
        function updateSteps() {
            $('.form-step').addClass('d-none').removeClass('d-block');
            $(`.form-step[data-step="${currentStep}"]`).removeClass('d-none').addClass('d-block');

            // Deshabilitar el botón "Anterior" en el primer paso
            $('#prev-btn').prop('disabled', currentStep === 1);
        }

        // Escuchar cambio en los radios de la pregunta 2
        $('input[name="viveConProgenitores"]').change(function () {
            const selectedValue = $('input[name="viveConProgenitores"]:checked').val();
            const stepProgenitor2 = $('#step-progenitor-2');

            if (selectedValue === 'uno') {
                stepProgenitor2.addClass('d-none').attr('data-skip', 'true');
            } else {
                stepProgenitor2.removeClass('d-none').attr('data-skip', 'false');
            }
        });

        // Botón "Siguiente"
        $('#next-btn').click(function () {
            let nextStep = currentStep + 1;

			const $reglamentoGroup = $('input[name="reglamento"]');
			if ($reglamentoGroup.length && !$reglamentoGroup.filter(':checked').length) {
				Swal.fire({
					title: 'Error',
					text: 'Por favor confirma si has leído el Reglamento de Becas 2025.',
					icon: 'error',
					confirmButtonText: 'Entendido'
				});
				return;
			}
            // Saltar el paso 4 si está marcado como omitido
            if ($(`#step-progenitor-2`).attr('data-skip') === 'true' && nextStep === 4) {
                nextStep++;
            }

            if ($(`.form-step[data-step="${nextStep}"]`).length) {
                currentStep = nextStep;
                updateSteps();
            }
        });

        // Botón "Anterior"
        $('#prev-btn').click(function () {
            let prevStep = currentStep - 1;

            // Saltar el paso 4 si está marcado como omitido
            if ($(`#step-progenitor-2`).attr('data-skip') === 'true' && prevStep === 4) {
                prevStep--;
            }

            if ($(`.form-step[data-step="${prevStep}"]`).length) {
                currentStep = prevStep;
                updateSteps();
            }
        });

        updateSteps();

        $('#buscarEstudiante').on('click', function() {
            const tipoDocumento = $('#tipoDocumento').val();
            const numeroDocumento = $('#nroDocumento').val();

            if (!tipoDocumento) {
                //alert('Por favor, ingrese un número de documento.');
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, seleccione un tipo de documento.',
                    icon: 'danger',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#3085d6',
                    background: '#fff',
                    timer: 4000 // Si deseas que desaparezca después de 4 segundos
                });
                return;
            }

            if (!numeroDocumento) {
                //alert('Por favor, ingrese un número de documento.');
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, ingrese un número de documento.',
                    icon: 'danger',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#3085d6',
                    background: '#fff',
                    timer: 4000 // Si deseas que desaparezca después de 4 segundos
                });
                return;
            }

            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ route('estudiantes.buscar') }}",
                type: "GET",
                data: { tipoDocumento: tipoDocumento ,nroDocumento: numeroDocumento },
                success: function(response) {
                    if (response.success) {
                        $('#id_estudiante').val(response.data.id);
                        $('#nombres').val(response.data.nombres);
                        $('#apellidos').val(response.data.apellidos);
                        $('#codigo_sianet').val(response.data.codigo_sianet);
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'danger',
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#3085d6',
                            background: '#fff',
                            timer: 4000 // Si deseas que desaparezca después de 4 segundos
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                            title: 'Error',
                            text: 'Error al buscar el estudiante. Verifique el número de documento.',
                            icon: 'danger',
                            confirmButtonText: 'Aceptar',
                            confirmButtonColor: '#3085d6',
                            background: '#fff',
                            timer: 4000 // Si deseas que desaparezca después de 4 segundos
                        });
                }
            });
        });
    });
</script>
        <!-- end container -->
    </section>
    <!-- end section -->
@endsection
