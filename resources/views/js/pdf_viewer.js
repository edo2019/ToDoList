import * as pdfjsLib from "pdfjs-dist/build/pdf";
import pdfjsWorker from "pdfjs-dist/build/pdf.worker.entry";

pdfjsLib.GlobalWorkerOptions.workerSrc = pdfjsWorker;

const url = "/storage/your-pdf-file.pdf"; // Path to your PDF (adjust as needed)

pdfjsLib.getDocument(url).promise.then((pdfDoc) => {
    pdfDoc.getPage(1).then((page) => {
        const canvas = document.getElementById("pdfCanvas");
        const context = canvas.getContext("2d");
        const viewport = page.getViewport({ scale: 1.5 });

        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderContext = {
            canvasContext: context,
            viewport: viewport,
        };

        page.render(renderContext);
    });
});
