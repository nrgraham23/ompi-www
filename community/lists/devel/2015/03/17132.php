<?
$subject_val = "Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228";
include("../../include/msg-header.inc");
?>
<!-- received="Fri Mar 13 15:08:50 2015" -->
<!-- isoreceived="20150313190850" -->
<!-- sent="Fri, 13 Mar 2015 15:08:48 -0400" -->
<!-- isosent="20150313190848" -->
<!-- name="George Bosilca" -->
<!-- email="bosilca_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228" -->
<!-- id="CAMJJpkXeDDfS1D7eYVFe2yGB0ixiU-X087WiNX-d87EJOcCW6A_at_mail.gmail.com" -->
<!-- charset="UTF-8" -->
<!-- inreplyto="55032A5D.10008_at_cora.nwra.com" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228<br>
<strong>From:</strong> George Bosilca (<em>bosilca_at_[hidden]</em>)<br>
<strong>Date:</strong> 2015-03-13 15:08:48
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17133.php">Orion Poplawski: "Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<li><strong>Previous message:</strong> <a href="17131.php">Orion Poplawski: "[OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<li><strong>In reply to:</strong> <a href="17131.php">Orion Poplawski: "[OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17133.php">Orion Poplawski: "Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<li><strong>Reply:</strong> <a href="17133.php">Orion Poplawski: "Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Do you have the same behavior when you disable the vader BTL ? (--mca btl
<br>
^vader).
<br>
<p>&nbsp;&nbsp;George.
<br>
<p><p>On Fri, Mar 13, 2015 at 2:20 PM, Orion Poplawski &lt;orion_at_[hidden]&gt;
<br>
wrote:
<br>
<p><span class="quotelev1">&gt; We currently have openmpi-1.8.4-99-20150228 built in Fedora Rawhide.  I'm
</span><br>
<span class="quotelev1">&gt; now
</span><br>
<span class="quotelev1">&gt; seeing crashes/hangs when running the netcdf test suite on i686.  Crashes
</span><br>
<span class="quotelev1">&gt; include:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; [mock1:23702] *** An error occurred in MPI_Allreduce
</span><br>
<span class="quotelev1">&gt; [mock1:23702] *** reported by process [3653173249,1]
</span><br>
<span class="quotelev1">&gt; [mock1:23702] *** on communicator MPI COMMUNICATOR 7 DUP FROM 6
</span><br>
<span class="quotelev1">&gt; [mock1:23702] *** MPI_ERR_IN_STATUS: error code in status
</span><br>
<span class="quotelev1">&gt; [mock1:23702] *** MPI_ERRORS_ARE_FATAL (processes in this communicator will
</span><br>
<span class="quotelev1">&gt; now abort,
</span><br>
<span class="quotelev1">&gt; [mock1:23702] ***    and potentially your MPI job)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; and a similar one in MPI_Bcast.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Hangs (100%cpu) seem to be in opal_condition_wait() -&gt; opal_progress()
</span><br>
<span class="quotelev1">&gt; calling
</span><br>
<span class="quotelev1">&gt; both mca_pml_ob1_progress and mca_btl_vader_component_progress.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; #0  mca_btl_vader_check_fboxes () at btl_vader_fbox.h:192
</span><br>
<span class="quotelev1">&gt; #1  mca_btl_vader_component_progress () at btl_vader_component.c:694
</span><br>
<span class="quotelev1">&gt; #2  0xf3971b69 in opal_progress () at runtime/opal_progress.c:187
</span><br>
<span class="quotelev1">&gt; #3  0xf40b4695 in opal_condition_wait (c=&lt;optimized out&gt;, m=&lt;optimized
</span><br>
<span class="quotelev1">&gt; out&gt;)
</span><br>
<span class="quotelev1">&gt;     at ../opal/threads/condition.h:78
</span><br>
<span class="quotelev1">&gt; #4  ompi_request_default_wait_all (count=6, requests=&lt;optimized out&gt;,
</span><br>
<span class="quotelev1">&gt; statuses=0x0)
</span><br>
<span class="quotelev1">&gt;     at request/req_wait.c:281
</span><br>
<span class="quotelev1">&gt; #5  0xf28bb5e7 in ompi_coll_tuned_alltoall_intra_basic_linear
</span><br>
<span class="quotelev1">&gt; (sbuf=sbuf_at_entry=0xf7a2d328,
</span><br>
<span class="quotelev1">&gt;     scount=scount_at_entry=1, sdtype=sdtype_at_entry=0xf4148240 &lt;ompi_mpi_int&gt;,
</span><br>
<span class="quotelev1">&gt;     rbuf=rbuf_at_entry=0xf7af1920, rcount=rcount_at_entry=1,
</span><br>
<span class="quotelev1">&gt;     rdtype=rdtype_at_entry=0xf4148240 &lt;ompi_mpi_int&gt;, comm=comm_at_entry
</span><br>
<span class="quotelev1">&gt; =0xf7b051d8,
</span><br>
<span class="quotelev1">&gt;     module=module_at_entry=0xf7a2b4d0) at coll_tuned_alltoall.c:700
</span><br>
<span class="quotelev1">&gt; #6  0xf28b4d08 in ompi_coll_tuned_alltoall_intra_dec_fixed
</span><br>
<span class="quotelev1">&gt; (sbuf=0xf7a2d328,
</span><br>
<span class="quotelev1">&gt; scount=1,
</span><br>
<span class="quotelev1">&gt;     sdtype=0xf4148240 &lt;ompi_mpi_int&gt;, rbuf=0xf7af1920, rcount=1,
</span><br>
<span class="quotelev1">&gt;     rdtype=0xf4148240 &lt;ompi_mpi_int&gt;, comm=0xf7b051d8, module=0xf7a2b4d0)
</span><br>
<span class="quotelev1">&gt;     at coll_tuned_decision_fixed.c:130
</span><br>
<span class="quotelev1">&gt; #7  0xf40c7899 in PMPI_Alltoall (sendbuf=sendbuf_at_entry=0xf7a2d328,
</span><br>
<span class="quotelev1">&gt;     sendcount=sendcount_at_entry=1, sendtype=sendtype_at_entry=0xf4148240
</span><br>
<span class="quotelev1">&gt; &lt;ompi_mpi_int&gt;,
</span><br>
<span class="quotelev1">&gt;     recvbuf=recvbuf_at_entry=0xf7af1920, recvcount=recvcount_at_entry=1,
</span><br>
<span class="quotelev1">&gt;     recvtype=recvtype_at_entry=0xf4148240 &lt;ompi_mpi_int&gt;, comm=0xf7b051d8) at
</span><br>
<span class="quotelev1">&gt; palltoall.c:111
</span><br>
<span class="quotelev1">&gt; #8  0xe9780da0 in ADIOI_Calc_others_req (fd=fd_at_entry=0xf7b12640,
</span><br>
<span class="quotelev1">&gt; count_my_req_procs=1,
</span><br>
<span class="quotelev1">&gt;     count_my_req_per_proc=0xf7a2d328, my_req=0xf7b00750, nprocs=4,
</span><br>
<span class="quotelev1">&gt; myrank=0,
</span><br>
<span class="quotelev1">&gt;     count_others_req_procs_ptr=count_others_req_procs_ptr_at_entry
</span><br>
<span class="quotelev1">&gt; =0xffbea6e8,
</span><br>
<span class="quotelev1">&gt;     others_req_ptr=others_req_ptr_at_entry=0xffbea6cc) at
</span><br>
<span class="quotelev1">&gt; adio/common/ad_aggregate.c:453
</span><br>
<span class="quotelev1">&gt; #9  0xe9796a14 in ADIOI_GEN_WriteStridedColl (fd=0xf7b12640,
</span><br>
<span class="quotelev1">&gt; buf=0xf7aa0148,
</span><br>
<span class="quotelev1">&gt; count=2440,
</span><br>
<span class="quotelev1">&gt;     datatype=0xf4148840 &lt;ompi_mpi_byte&gt;, file_ptr_type=100, offset=0,
</span><br>
<span class="quotelev1">&gt; status=0xffbea8b8,
</span><br>
<span class="quotelev1">&gt;     error_code=0xffbea790) at adio/common/ad_write_coll.c:192
</span><br>
<span class="quotelev1">&gt; #10 0xe97779e0 in MPIOI_File_write_all (fh=fh_at_entry=0xf7b12640,
</span><br>
<span class="quotelev1">&gt; offset=offset_at_entry=0,
</span><br>
<span class="quotelev1">&gt;     file_ptr_type=file_ptr_type_at_entry=100, buf=buf_at_entry=0xf7aa0148,
</span><br>
<span class="quotelev1">&gt; count=count_at_entry=2440,
</span><br>
<span class="quotelev1">&gt;     datatype=datatype_at_entry=0xf4148840 &lt;ompi_mpi_byte&gt;,
</span><br>
<span class="quotelev1">&gt;     myname=myname_at_entry=0xe97a9a1c &lt;myname.9354&gt; &quot;MPI_FILE_WRITE_AT_ALL&quot;,
</span><br>
<span class="quotelev1">&gt;     status=status_at_entry=0xffbea8b8) at mpi-io/write_all.c:116
</span><br>
<span class="quotelev1">&gt; #11 0xe9778176 in mca_io_romio_dist_MPI_File_write_at_all (fh=0xf7b12640,
</span><br>
<span class="quotelev1">&gt;     offset=offset_at_entry=0, buf=buf_at_entry=0xf7aa0148, count=count_at_entry
</span><br>
<span class="quotelev1">&gt; =2440,
</span><br>
<span class="quotelev1">&gt;     datatype=datatype_at_entry=0xf4148840 &lt;ompi_mpi_byte&gt;,
</span><br>
<span class="quotelev1">&gt; status=status_at_entry=0xffbea8b8)
</span><br>
<span class="quotelev1">&gt;     at mpi-io/write_atall.c:55
</span><br>
<span class="quotelev1">&gt; #12 0xe9770bcc in mca_io_romio_file_write_at_all (fh=0xf7aa27c8, offset=0,
</span><br>
<span class="quotelev1">&gt; buf=0xf7aa0148,
</span><br>
<span class="quotelev1">&gt;     count=2440, datatype=0xf4148840 &lt;ompi_mpi_byte&gt;, status=0xffbea8b8)
</span><br>
<span class="quotelev1">&gt;     at src/io_romio_file_write.c:61
</span><br>
<span class="quotelev1">&gt; #13 0xf40ff3ce in PMPI_File_write_at_all (fh=0xf7aa27c8, offset=0,
</span><br>
<span class="quotelev1">&gt; buf=buf_at_entry=0xf7aa0148,
</span><br>
<span class="quotelev1">&gt;     count=count_at_entry=2440, e=0xf4148840 &lt;ompi_mpi_byte&gt;,
</span><br>
<span class="quotelev1">&gt; status=status_at_entry=0xffbea8b8)
</span><br>
<span class="quotelev1">&gt;     at pfile_write_at_all.c:75
</span><br>
<span class="quotelev1">&gt; #14 0xf437a43c in H5FD_mpio_write (_file=_file_at_entry=0xf7b074a8,
</span><br>
<span class="quotelev1">&gt;     type=type_at_entry=H5FD_MEM_DRAW, dxpl_id=167772177, addr=31780,
</span><br>
<span class="quotelev1">&gt; size=size_at_entry=2440,
</span><br>
<span class="quotelev1">&gt;     buf=buf_at_entry=0xf7aa0148) at ../../src/H5FDmpio.c:1840
</span><br>
<span class="quotelev1">&gt; #15 0xf4375cd5 in H5FD_write (file=0xf7b074a8, dxpl=0xf7a47d20,
</span><br>
<span class="quotelev1">&gt; type=H5FD_MEM_DRAW,
</span><br>
<span class="quotelev1">&gt;     addr=31780, size=size_at_entry=2440, buf=buf_at_entry=0xf7aa0148) at
</span><br>
<span class="quotelev1">&gt; ../../src/H5FDint.c:245
</span><br>
<span class="quotelev1">&gt; #16 0xf4360932 in H5F__accum_write (fio_info=fio_info_at_entry=0xffbea9d4,
</span><br>
<span class="quotelev1">&gt;     type=type_at_entry=H5FD_MEM_DRAW, addr=31780, size=size_at_entry=2440,
</span><br>
<span class="quotelev1">&gt; buf=buf_at_entry=0xf7aa0148)
</span><br>
<span class="quotelev1">&gt;     at ../../src/H5Faccum.c:824
</span><br>
<span class="quotelev1">&gt; #17 0xf436430c in H5F_block_write (f=0xf7a31860,
</span><br>
<span class="quotelev1">&gt; type=type_at_entry=H5FD_MEM_DRAW, addr=31780,
</span><br>
<span class="quotelev1">&gt;     size=size_at_entry=2440, dxpl_id=167772177, buf=0xf7aa0148) at
</span><br>
<span class="quotelev1">&gt; ../../src/H5Fio.c:170
</span><br>
<span class="quotelev1">&gt; #18 0xf43413ee in H5D__mpio_select_write (io_info=0xffbeab60,
</span><br>
<span class="quotelev1">&gt; type_info=0xffbeab1c,
</span><br>
<span class="quotelev1">&gt;     mpi_buf_count=2440, file_space=0x0, mem_space=0x0) at
</span><br>
<span class="quotelev1">&gt; ../../src/H5Dmpio.c:296
</span><br>
<span class="quotelev1">&gt; #19 0xf4341f33 in H5D__final_collective_io (mpi_buf_type=0xffbeaa7c,
</span><br>
<span class="quotelev1">&gt; mpi_file_type=0xffbeaa78,
</span><br>
<span class="quotelev1">&gt;     mpi_buf_count=&lt;optimized out&gt;, type_info=0xffbeab1c,
</span><br>
<span class="quotelev1">&gt; io_info=0xffbeab60)
</span><br>
<span class="quotelev1">&gt;     at ../../src/H5Dmpio.c:1444
</span><br>
<span class="quotelev1">&gt; #20 H5D__inter_collective_io (mem_space=0xf7a38120, file_space=0xf7a55590,
</span><br>
<span class="quotelev1">&gt;     type_info=0xffbeab1c, io_info=0xffbeab60) at ../../src/H5Dmpio.c:1400
</span><br>
<span class="quotelev1">&gt; #21 H5D__contig_collective_write (io_info=0xffbeab60, type_info=0xffbeab1c,
</span><br>
<span class="quotelev1">&gt; nelmts=610,
</span><br>
<span class="quotelev1">&gt;     file_space=0xf7a55590, mem_space=0xf7a38120, fm=0xffbeace0) at
</span><br>
<span class="quotelev1">&gt; ../../src/H5Dmpio.c:528
</span><br>
<span class="quotelev1">&gt; #22 0xf433ae8d in H5D__write (buf=0xf7aa0148, dxpl_id=167772177,
</span><br>
<span class="quotelev1">&gt; file_space=0xf7a55590,
</span><br>
<span class="quotelev1">&gt;     mem_space=0xf7a38120, mem_type_id=-140159600, dataset=0xf7a3eb40) at
</span><br>
<span class="quotelev1">&gt; ../../src/H5Dio.c:787
</span><br>
<span class="quotelev1">&gt; #23 H5D__pre_write (dset=dset_at_entry=0xf7a3eb40, direct_write=&lt;optimized
</span><br>
<span class="quotelev1">&gt; out&gt;,
</span><br>
<span class="quotelev1">&gt;     mem_type_id=mem_type_id_at_entry=50331747, mem_space=mem_space_at_entry
</span><br>
<span class="quotelev1">&gt; =0xf7a38120,
</span><br>
<span class="quotelev1">&gt;     file_space=0xf7a55590, dxpl_id=dxpl_id_at_entry=167772177,
</span><br>
<span class="quotelev1">&gt; buf=buf_at_entry=0xf7aa0148)
</span><br>
<span class="quotelev1">&gt;     at ../../src/H5Dio.c:351
</span><br>
<span class="quotelev1">&gt; #24 0xf433b74c in H5Dwrite (dset_id=83886085, mem_type_id=50331747,
</span><br>
<span class="quotelev1">&gt;     mem_space_id=mem_space_id_at_entry=67108867,
</span><br>
<span class="quotelev1">&gt; file_space_id=file_space_id_at_entry=67108866,
</span><br>
<span class="quotelev1">&gt;     dxpl_id=dxpl_id_at_entry=167772177, buf=buf_at_entry=0xf7aa0148) at
</span><br>
<span class="quotelev1">&gt; ../../src/H5Dio.c:270
</span><br>
<span class="quotelev1">&gt; #25 0xf466b603 in nc4_put_vara (nc=0xf7a05c58, ncid=ncid_at_entry=65536,
</span><br>
<span class="quotelev1">&gt; varid=varid_at_entry=3,
</span><br>
<span class="quotelev1">&gt;     startp=startp_at_entry=0xffbf6a08, countp=countp_at_entry=0xffbf6a10,
</span><br>
<span class="quotelev1">&gt;     mem_nc_type=mem_nc_type_at_entry=5, is_long=is_long_at_entry=0,
</span><br>
<span class="quotelev1">&gt; data=data_at_entry=0xf7a07c40)
</span><br>
<span class="quotelev1">&gt;     at ../../libsrc4/nc4hdf.c:788
</span><br>
<span class="quotelev1">&gt; #26 0xf4673c55 in nc4_put_vara_tc (mem_type_is_long=0, op=0xf7a07c40,
</span><br>
<span class="quotelev1">&gt; countp=0xffbf6a10,
</span><br>
<span class="quotelev1">&gt;     startp=0xffbf6a08, mem_type=5, varid=3, ncid=65536) at
</span><br>
<span class="quotelev1">&gt; ../../libsrc4/nc4var.c:1429
</span><br>
<span class="quotelev1">&gt; #27 NC4_put_vara (ncid=65536, varid=3, startp=0xffbf6a08,
</span><br>
<span class="quotelev1">&gt; countp=0xffbf6a10,
</span><br>
<span class="quotelev1">&gt; op=0xf7a07c40,
</span><br>
<span class="quotelev1">&gt;     memtype=5) at ../../libsrc4/nc4var.c:1565
</span><br>
<span class="quotelev1">&gt; #28 0xf460a377 in NC_put_vara (ncid=ncid_at_entry=65536, varid=varid_at_entry=3,
</span><br>
<span class="quotelev1">&gt;     start=start_at_entry=0xffbf6a08, edges=edges_at_entry=0xffbf6a10,
</span><br>
<span class="quotelev1">&gt; value=value_at_entry=0xf7a07c40,
</span><br>
<span class="quotelev1">&gt;     memtype=memtype_at_entry=5) at ../../libdispatch/dvarput.c:79
</span><br>
<span class="quotelev1">&gt; #29 0xf460b541 in nc_put_vara_float (ncid=65536, varid=3,
</span><br>
<span class="quotelev1">&gt; startp=0xffbf6a08,
</span><br>
<span class="quotelev1">&gt;     countp=0xffbf6a10, op=0xf7a07c40) at ../../libdispatch/dvarput.c:655
</span><br>
<span class="quotelev1">&gt; #30 0xf77d06ed in test_pio_2d (cache_size=67108864, facc_type=8192,
</span><br>
<span class="quotelev1">&gt; access_flag=1,
</span><br>
<span class="quotelev1">&gt;     comm=0xf414d800 &lt;ompi_mpi_comm_world&gt;, info=0xf4154240
</span><br>
<span class="quotelev1">&gt; &lt;ompi_mpi_info_null&gt;, mpi_size=4,
</span><br>
<span class="quotelev1">&gt;     mpi_rank=0, chunk_size=0xffbf76f4) at ../../nc_test4/tst_nc4perf.c:96
</span><br>
<span class="quotelev1">&gt; #31 0xf77cfdb1 in main (argc=1, argv=0xffbf7804) at
</span><br>
<span class="quotelev1">&gt; ../../nc_test4/tst_nc4perf.c:299
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Any suggests as to where to look next would be greatly appreciated.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Orion Poplawski
</span><br>
<span class="quotelev1">&gt; Technical Manager                     303-415-9701 x222
</span><br>
<span class="quotelev1">&gt; NWRA, Boulder/CoRA Office             FAX: 303-415-9702
</span><br>
<span class="quotelev1">&gt; 3380 Mitchell Lane                       orion_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Boulder, CO 80301                   <a href="http://www.nwra.com">http://www.nwra.com</a>
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post:
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/community/lists/devel/2015/03/17131.php">http://www.open-mpi.org/community/lists/devel/2015/03/17131.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<p><hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-17132/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="17133.php">Orion Poplawski: "Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<li><strong>Previous message:</strong> <a href="17131.php">Orion Poplawski: "[OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<li><strong>In reply to:</strong> <a href="17131.php">Orion Poplawski: "[OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="17133.php">Orion Poplawski: "Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<li><strong>Reply:</strong> <a href="17133.php">Orion Poplawski: "Re: [OMPI devel] hangs/crashes with openmpi-1.8.4-99-20150228"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
