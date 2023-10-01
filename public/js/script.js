function handleEditJabatan(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#jabatanEditModal").modal('toggle')

            const jabatanEditNama = document.querySelector("#jabatanEditNama")
            const jabatanEditStatus = document.querySelector("#jabatanEditStatus")
            const jabatanEditForm = document.querySelector("#jabatanEditForm")

            jabatanEditForm.setAttribute('action', data.dataset.url)
            jabatanEditNama.value = adata.name
            jabatanEditStatus.value = adata.status
        }
    })
}

function handleEditPegawai(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#dataPegawaiEditModal").modal('toggle')
            console.log(adata)

            const dataPegawaiFormEdit = document.querySelector("#dataPegawaiFormEdit");
            const pegawaiEditId = document.querySelector("#pegawaiEditId");
            const pegawaiEditName = document.querySelector("#pegawaiEditName");
            const pegawaiEditUsername = document.querySelector("#pegawaiEditUsername");
            const pegawaiEditPassword = document.querySelector("#pegawaiEditPassword");
            const pegawaiEditRoles = document.querySelector("#pegawaiEditRoles");
            const pegawaiEditJabatan = document.querySelector("#pegawaiEditJabatan");
            const pegawaiEditStatus = document.querySelector("#pegawaiEditStatus");
            const pegawaiEditEmail = document.querySelector("#pegawaiEditEmail");
            const pegawaiEditTelp = document.querySelector("#pegawaiEditTelp");

            dataPegawaiFormEdit.setAttribute('action', data.dataset.url)
            pegawaiEditId.value = adata.id
            pegawaiEditName.value = adata.name
            pegawaiEditUsername.value = adata.username
            pegawaiEditPassword.value = ''
            pegawaiEditRoles.value = adata.roles
            pegawaiEditJabatan.value = adata.jabatan_id
            pegawaiEditStatus.value = adata.status
            pegawaiEditEmail.value = adata.email
            pegawaiEditTelp.value = adata.telp
        }
    })
}

function handleShowPegawai(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#dataPegawaiShowModal").modal('toggle')
            console.log(adata)

            const pegawaiShowName = document.querySelector("#pegawaiShowName");
            const pegawaiShowUsername = document.querySelector("#pegawaiShowUsername");
            const pegawaiShowRoles = document.querySelector("#pegawaiShowRoles");
            const pegawaiShowJabatan = document.querySelector("#pegawaiShowJabatan");
            const pegawaiShowStatus = document.querySelector("#pegawaiShowStatus");
            const pegawaiShowEmail = document.querySelector("#pegawaiShowEmail");
            const pegawaiShowTelp = document.querySelector("#pegawaiShowTelp");

            pegawaiShowName.value = adata.name
            pegawaiShowUsername.value = adata.username
            pegawaiShowRoles.value = adata.roles
            pegawaiShowJabatan.value = adata.jabatan_id
            pegawaiShowStatus.value = adata.status
            pegawaiShowEmail.value = adata.email
            pegawaiShowTelp.value = adata.telp
        }
    })
}

function handleShowSuratM(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#suratMasukShowModal").modal('toggle')

            let divisi = null;
            $.ajax({
                url: `/ajax/divisi/${adata.divisi_id}`,
                dataType: "JSON",
                type: "GET",
                success: (subdata) => {
                    const showSuratMDivisi = document.querySelector("#showSuratMDivisi");
                    showSuratMDivisi.value = subdata.name
                }
            })

            const showSuratMStatusSurat = document.querySelector("#showSuratMStatusSurat");
            const showSuratMSifatSurat = document.querySelector("#showSuratMSifatSurat");
            const showSuratMSumberSurat = document.querySelector("#showSuratMSumberSurat");
            const showSuratMNoSurat = document.querySelector("#showSuratMNoSurat");
            const showSuratMKodeSurat = document.querySelector("#showSuratMKodeSurat");
            const showSuratMTanggalSurat = document.querySelector("#showSuratMTanggalSurat");
            const showSuratMTanggalSuratMasuk = document.querySelector("#showSuratMTanggalSuratMasuk");
            const showSuratMPerihal = document.querySelector("#showSuratMPerihal");
            const showSuratMFile = document.querySelector("#showSuratMFile");
            const spanShowFileSuratM = document.querySelector("#spanShowFileSuratM");

            showSuratMStatusSurat.value = adata.status_surat
            showSuratMSifatSurat.value = adata.sifat_surat
            showSuratMSumberSurat.value = adata.sumber_surat
            showSuratMNoSurat.value = adata.no_surat
            showSuratMKodeSurat.value = adata.kode_surat
            showSuratMTanggalSurat.value = adata.tanggal_surat
            showSuratMTanggalSuratMasuk.value = adata.tanggal_surat_masuk
            showSuratMPerihal.value = adata.perihal

            spanShowFileSuratM.classList.remove('d-none')
            showSuratMFile.classList.add('disabled')
            if(adata.file != null) {
                spanShowFileSuratM.classList.add('d-none')
                showSuratMFile.classList.remove('disabled')
                showSuratMFile.setAttribute('href', `surat/masuk/${adata.file}`);
            }
        }
    })
}

function handleEditSuratM(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#suratMasukEditModal").modal('toggle')

            let kodedivisi = adata.no_surat.slice(0, -4);

            let divisi = null;

            const suratMasukEditForm = document.querySelector("#suratMasukEditForm");
            const editSuratMStatusSurat = document.querySelector("#editSuratMStatusSurat");
            const editSuratMId = document.querySelector("#editSuratMId");
            const editSuratMSifatSurat = document.querySelector("#editSuratMSifatSurat");
            const editSuratMSumberSurat = document.querySelector("#editSuratMSumberSurat");
            const editSuratMNoSurat = document.querySelector("#editSuratMNoSurat");
            const editSuratMKodeSurat = document.querySelector("#editSuratMKodeSurat");
            const editSuratMDivisiInput = document.querySelector("#editSuratMDivisiInput");
            const editSuratMDivisiSelect = document.querySelector("#editSuratMDivisiSelect");
            const editSuratMTanggalSurat = document.querySelector("#editSuratMTanggalSurat");
            const editSuratMTanggalSuratMasuk = document.querySelector("#editSuratMTanggalSuratMasuk");
            const editSuratMPerihal = document.querySelector("#editSuratMPerihal");
            const editSuratMCatatan = document.querySelector("#editSuratMCatatan");

            $.ajax({
                url: `/ajax/divisi/${adata.divisi_id}`,
                dataType: "JSON",
                type: "GET",
                success: function(subdata) {
                    editSuratMDivisiInput.value = subdata.name
                    editSuratMDivisiSelect.value = subdata.id
                }
            })

            suratMasukEditForm.setAttribute('action', data.dataset.url)
            editSuratMStatusSurat.value = adata.status_surat
            editSuratMId.value = adata.id
            editSuratMSifatSurat.value = adata.sifat_surat
            editSuratMSumberSurat.value = adata.sumber_surat
            editSuratMNoSurat.value = kodedivisi
            editSuratMKodeSurat.value = adata.kode_surat
            
            editSuratMTanggalSurat.value = adata.tanggal_surat
            editSuratMTanggalSuratMasuk.value = adata.tanggal_surat_masuk
            editSuratMPerihal.value = adata.perihal

            editSuratMStatusSurat.setAttribute('readonly', 'readonly')
            editSuratMId.setAttribute('readonly', 'readonly')
            editSuratMSifatSurat.setAttribute('readonly', 'readonly')
            editSuratMSumberSurat.setAttribute('readonly', 'readonly')
            editSuratMNoSurat.setAttribute('readonly', 'readonly')
            editSuratMKodeSurat.setAttribute('readonly', 'readonly')
            editSuratMDivisiInput.setAttribute('readonly', 'readonly')
            editSuratMTanggalSurat.setAttribute('readonly', 'readonly')
            editSuratMTanggalSuratMasuk.setAttribute('readonly', 'readonly')
            editSuratMPerihal.setAttribute('readonly', 'readonly')

            editSuratMDivisiInput.classList.remove('d-none')
            editSuratMDivisiSelect.classList.add('d-none')

            const editSuratMFile = document.querySelector("#editSuratMFile");
            const spanEditFileSuratM = document.querySelector("#spanEditFileSuratM");
            spanEditFileSuratM.classList.remove('d-none')
            editSuratMFile.classList.add('disabled')
            if(adata.file != null) {
                spanEditFileSuratM.classList.add('d-none')
                editSuratMFile.classList.remove('disabled')
                editSuratMFile.setAttribute('href', `surat/masuk/${adata.file}`);
            }

            const rowDownloadBtnEditSM = document.querySelector("#rowDownloadBtnEditSM");
            const rowVerifEditSM = document.querySelector("#rowVerifEditSM");
            const rowInputFileEditSM = document.querySelector("#rowInputFileEditSM");
            
            if(data.dataset.status == "koreksi") {
                rowInputFileEditSM.classList.remove('d-none')
                rowDownloadBtnEditSM.classList.add('d-none')
                rowVerifEditSM.classList.add('d-none')

                editSuratMStatusSurat.removeAttribute('readonly')
                editSuratMId.removeAttribute('readonly')
                editSuratMSifatSurat.removeAttribute('readonly')
                editSuratMSumberSurat.removeAttribute('readonly')
                editSuratMNoSurat.removeAttribute('readonly')
                editSuratMKodeSurat.removeAttribute('readonly')
                editSuratMDivisiInput.removeAttribute('readonly')
                editSuratMTanggalSurat.removeAttribute('readonly')
                editSuratMTanggalSuratMasuk.removeAttribute('readonly')
                editSuratMPerihal.removeAttribute('readonly')

                editSuratMDivisiInput.classList.add('d-none')
                editSuratMDivisiSelect.classList.remove('d-none')
                
                editSuratMCatatan.setAttribute('disabled', 'disabled')
            } else if(data.dataset.status == "verif") {
                rowInputFileEditSM.classList.add('d-none')
                rowDownloadBtnEditSM.classList.remove('d-none')
                rowVerifEditSM.classList.remove('d-none')
            }
        }
    })
}

function handleShowSuratK(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#suratKeluarShowModal").modal('toggle')

            const showSuratKNoSurat = document.querySelector("#showSuratKNoSurat");
            const showSuratKSifat = document.querySelector("#showSuratKSifat");
            const showSuratKDivisi = document.querySelector("#showSuratKDivisi");
            const showSuratKPerihal = document.querySelector("#showSuratKPerihal");
            const showSuratKTanggal = document.querySelector("#showSuratKTanggal");
            const showSuratKKepada = document.querySelector("#showSuratKKepada");
            const showSuratKPembuat = document.querySelector("#showSuratKPembuat");
            const showSuratKStatus = document.querySelector("#showSuratKStatus");
            
            showSuratKNoSurat.value = adata.no_surat
            showSuratKSifat.value = adata.sifat_surat
            showSuratKDivisi.value = adata.divisi_id
            showSuratKPerihal.value = adata.perihal
            showSuratKTanggal.value = adata.tanggal_surat
            showSuratKKepada.value = adata.surat_kepada
            showSuratKPembuat.value = adata.pembuat_surat
            showSuratKStatus.value = adata.status_surat

            const showLampiran = document.querySelector("#showLampiran");
            const showSuratKLampiranSpan = document.querySelector("#showSuratKLampiranSpan");

            showLampiran.classList.add('disabled')
            showSuratKLampiranSpan.classList.remove('d-none')
            if(adata.lampiran != null) {
                showLampiran.classList.remove('disabled')
                showSuratKLampiranSpan.classList.add('d-none')
            }
        }
    })
}

function handleEditSuratK(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#suratKeluarEditModal").modal('toggle')
            console.log(data.dataset)

            const editSuratKForm = document.querySelector("#editSuratKForm");
            const editSuratKId = document.querySelector("#editSuratKId");
            const editSuratKNoSurat = document.querySelector("#editSuratKNoSurat");
            const editSuratKSifat = document.querySelector("#editSuratKSifat");
            const editSuratKDivisi = document.querySelector("#editSuratKDivisi");
            const editSuratKPerihal = document.querySelector("#editSuratKPerihal");
            const editSuratKTanggal = document.querySelector("#editSuratKTanggal");
            const editSuratKKepada = document.querySelector("#editSuratKKepada");
            const editSuratKPembuat = document.querySelector("#editSuratKPembuat");
            const editSuratKStatus = document.querySelector("#editSuratKStatus");

            editSuratKForm.setAttribute('action', data.dataset.url)
            editSuratKId.value = adata.id
            editSuratKNoSurat.value = adata.no_surat
            editSuratKSifat.value = adata.sifat_surat
            editSuratKDivisi.value = adata.divisi_id
            editSuratKPerihal.value = adata.perihal
            editSuratKTanggal.value = adata.tanggal_surat
            editSuratKKepada.value = adata.surat_kepada
            // editSuratKPembuat.value = adata.pembuat_surat
            // editSuratKStatus.value = adata.status_surat
        }
    })
}

function handleEditDivisi(data) {
    $.ajax({
        url: data.dataset.ajax,
        dataType: "JSON",
        type: "GET",
        success: function(adata) {
            $("#divisiEditModal").modal('toggle')

            const divisiFormEdit = document.querySelector("#divisiFormEdit");
            const editDivisiName = document.querySelector("#editDivisiName");
            const editDivisiKode = document.querySelector("#editDivisiKode");
            const editDivisiDesc = document.querySelector("#editDivisiDesc");
            const editDivisiStatus = document.querySelector("#editDivisiStatus");

            divisiFormEdit.setAttribute('action', data.dataset.url)
            editDivisiName.value = adata.name
            editDivisiKode.value = adata.kode
            editDivisiDesc.value = adata.desc
            editDivisiStatus.value = adata.status   
        }
    })
}

function handleDelete(data) {
    $("#deleteModal").modal('toggle');

    const hapusFormModal = document.querySelector('#hapusFormModal');

    hapusFormModal.setAttribute('action', data.dataset.url)
}

function changeLabelFile(data) {
    data.nextElementSibling.textContent = data.value.split('\\')[2] 
}